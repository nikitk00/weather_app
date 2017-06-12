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

function add_city($link, $id, $name, $country, $lon, $lat){
	$q = "INSERT INTO wthr_cities (id, name, country, longitude, latitude) VALUES ('%d', '%s', '%s', '%f', '%f')";
    
    $query = sprintf($q, 
					 mysqli_real_escape_string($link,$id), 
					 mysqli_real_escape_string($link,$name), 
					 mysqli_real_escape_string($link,$country), 
					 mysqli_real_escape_string($link,$lon), 
					 mysqli_real_escape_string($link,$lat));
    
    //echo $query."<br><br>";
    $result = mysqli_query($link, $query);
        
    if(!$result)
        die(mysqli_error($link));
    
    return true;
}

function get_city_by_id($link, $id){
	$q = sprintf("SELECT * FROM wthr_cities WHERE id='%d'", (int)$id);
	$result = mysqli_query($link, $q);
    
    if(!$result)
        die(mysqli_error($link));
    
    $city = mysqli_fetch_assoc($result);
    
    return $city;
}

function get_city_by_name($link, $name){
	$q = sprintf("SELECT * FROM wthr_cities WHERE name='%s'", mysqli_real_escape_string($link, $name));
	$result = mysqli_query($link, $q);
    
    if(!$result)
        die(mysqli_error($link));
    
    $city = mysqli_fetch_assoc($result);
    
    return $city;
}

function push_forecast($link, $report){
	$q = "INSERT INTO weather_cache (name, country, coords, date, pic, temp, fallout) VALUES ('%s', '%s', '%s', '%s', '%s', '%f', '%f')";
	$query = sprintf($q, 
					 mysqli_real_escape_string($link,$report['name']), 
					 mysqli_real_escape_string($link,$report['country']), 
					 mysqli_real_escape_string($link,implode(';',$report['coords'])), 
					 mysqli_real_escape_string($link,$report['date']), 
					 mysqli_real_escape_string($link,$report['pic']), 
					 mysqli_real_escape_string($link,$report['temp']), 
					 mysqli_real_escape_string($link,$report['fallout']));
	$result = mysqli_query($link, $query);
        
    if(!$result)
        die(mysqli_error($link));
    
    return true;
}

function get_forecast($link, $city){
	
}

?>