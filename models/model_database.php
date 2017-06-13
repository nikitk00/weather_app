<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'weather_app');

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die("Error: ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error: ".mysqli_error($link));
    }
    
    return $link;
}

function db_push_forecast($link, $data){
	$q = "INSERT INTO weather_cache (id, name, country, coords, date, pic, temp, fallout) VALUES ('%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
	$query = sprintf($q, 
					 $data['id'],
					 mysqli_real_escape_string($link,$data['name']), 
					 mysqli_real_escape_string($link,$data['country']), 
					 mysqli_real_escape_string($link,$data['coords']), 
					 mysqli_real_escape_string($link,$data['date']), 
					 mysqli_real_escape_string($link,$data['pic']), 
					 mysqli_real_escape_string($link,$data['temp']), 
					 mysqli_real_escape_string($link,$data['fallout']));
	$result = mysqli_query($link, $query);
        
    if(!$result)
        die(mysqli_error($link));
    
    return true;
}

function db_check_by_name($link, $city){
	$q = sprintf("SELECT * FROM weather_cache WHERE name='%s'", mysqli_real_escape_string($link, $city));
	$result = mysqli_query($link, $q);
    
	
    if(!mysqli_fetch_assoc($result))
        return false;
    return true;
}

function db_get_forecast_by_name($link, $city){
	$q = sprintf("SELECT * FROM weather_cache WHERE name='%s'", mysqli_real_escape_string($link, $city));
	$result = mysqli_query($link, $q);
    
    if(!$result)
        return false;
    
    $forecast = mysqli_fetch_assoc($result);
	
	if(isset($forecast['date'])){
		$d = explode(';', $forecast['date']);
		if($d[0] == date('d.m', time())){
			return $forecast;
		}
		else{
			db_del_forecast_by_id($link, $forecast['id']);
			return false;
		}
	}else{
		die('Error of reading!');
	}
}

function db_del_forecast_by_id($link, $id){
    $id = (int)$id;
    
    if($id <= 0)
        return false;
    
    $q = sprintf("DELETE FROM weather_cache WHERE id='%d'", $id);
    
    $result = mysqli_query($link, $q);
    if(!$result)
        die(mysqli_error($link));
    
    return mysqli_affected_rows($link);
}

function db_clear_table($link, $table){
	$q = "TRUNCATE TABLE $table";
	$result = mysqli_query($link, $q);
	
	if(!$result)
        die(mysqli_error($link));
	
	return true;
}

function weather_merger($forecast, $city){
	$res = array();
	$t = array();
	$res['id'] = $city['id'];
	array_push($t, $forecast[0]['date'], ';', $forecast[1]['date'], ';', $forecast[2]['date'], ';', $forecast[3]['date'], ';', $forecast[4]['date']);
	$res['date'] = implode($t);
	$t = array();
	array_push($t, $forecast[0]['pic'], ';', $forecast[1]['pic'], ';', $forecast[2]['pic'], ';', $forecast[3]['pic'], ';', $forecast[4]['pic']);
	$res['pic'] = implode($t);
	$t = array();
	array_push($t, round($forecast[0]['temp'], 2), ';', round($forecast[1]['temp'], 2), ';', round($forecast[2]['temp'], 2), ';', round($forecast[3]['temp'], 2), ';', round($forecast[4]['temp'], 2));
	$res['temp'] = implode($t);
	$t = array();
	array_push($t, round($forecast[0]['fallout'], 2), ';', round($forecast[1]['fallout'], 2), ';', round($forecast[2]['fallout'], 2), ';', round($forecast[3]['fallout'], 2), ';', round($forecast[4]['fallout'], 2));
	$res['fallout'] = implode($t);
	$res['name'] = $city['name'];
	$res['country'] = $city['country'];
	$res['coords'] = implode(';', $city['coord']);
	return $res;
}
function weather_separator($data){
	$res = array();
	$td = explode(';', $data['date']);
	$tp = explode(';', $data['pic']);
	$tt = explode(';', $data['temp']);
	$tf = explode(';', $data['fallout']);

	$res['id'] = $data['id'];
	for($i = 0; $i < 5; $i++){
		$t = array();
		$res['date'][$i] = $td[$i];
		$res['pic'][$i] = $tp[$i];
		$res['temp'][$i] = $tt[$i];
		$res['fallout'][$i] = $tf[$i];
	}
	$res['name'] = $data['name'];
	$res['country'] = $data['country'];
	$t = explode(';', $data['coords']);
	$res['coord']['lat'] = $t[0];
	$res['coord']['lon'] = $t[1];
	return $res;
}

?>