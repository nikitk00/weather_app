<?php

define("apiid", "711adf2f4a53502b33d9632b78518c63");

function find_city($name){
	$q = 'http://api.openweathermap.org/data/2.5/find?q=d'.$name.'hvjvbbvuberv456456456&appid='.apiid;
	$j = file_get_contents($q);
	$data = json_decode($j);
	if($data->cod == 401){
		throw new Exception('Error!!');
		echo 'ERROR!!';
	}
	var_dump($data);
	return $data;
}

function weather_format($data){
	$res = array();
	for($i = 0; $i < 5; $i++){
		$res[$i]['date'] = date('Y-m-d', $data->list[$i*8]->dt);
//		echo $res[$i]['date'].'<br>';
		
//		var_dump($data);
//		$tt = 0;
//		for($j = 0; $j < 7; $j++){
//			$tt += (int)($data->list[($i*8)+$j]->main->temp) - 273.15;
////			echo $tt.'<br>';
//		}
//		$res[$i]['avg_t'] = round(($tt/8), 1);
//		
//		echo '<br><br>'.$res[$i]['avg_t'].'<br>';
	}
	
	var_dump($res);
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
//	$res[''] = $data->;
}

function get_forecast_by_id($id){
	$q = 'http://api.openweathermap.org/data/2.5/forecast?id='.$id.'&appid='.apiid;
	$j = file_get_contents($q);
	$data = json_decode($j);
	if($data->cod == 401){
		throw new Exception('Error!!');
		echo 'ERROR!!';
	}
//	weather_format($data);
	return $data;
}

function get_forecast_by_coord($lat, $lon){
	$q = 'http://api.openweathermap.org/data/2.5/forecast?lat='.$lat.'&lon='.$lon.'&appid='.apiid;
	$j = file_get_contents($q);
	if(!$j){
		throw new Exception('Error!!');
		echo 'ERROR!!';
	}
	$data = json_decode($j);

	return $data;
}

?>