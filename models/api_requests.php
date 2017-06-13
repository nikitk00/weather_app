<?php

define("apiid", "711adf2f4a53502b33d9632b78518c63");

function find_city($name){
	$q = "http://api.openweathermap.org/data/2.5/find?q=$name&appid=".apiid;
	$j = file_get_contents($q);
	$data = json_decode($j);
	if((int)($data->cod / 100) == 4){
		throw new Exception('Error!!');
		echo 'ERROR!!';
	}
	if(isset($data->list[0])){
		$res = array();
		$res['id'] = $data->list[0]->id;
		$res['name'] = $data->list[0]->name;
		$res['country'] = $data->list[0]->sys->country;
		$res['coord']['lat'] = $data->list[0]->coord->lat;
		$res['coord']['lon'] = $data->list[0]->coord->lon;
		return $res;
	}
	else return false;
}

function weather_format($data){
	$res = array();
	for($i = 0; $i < 5; $i++){
		if(isset($data->list)){
			$res[$i]['date'] = date('d.m', $data->list[$i*8]->dt);     // date info
			$res[$i]['pic'] = $data->list[$i*8]->weather[0]->icon;    // pic of weather

			$tt = 0;
			$sr = .0;
			$s = 0;
			for($j = 0; ($j < 7)&&((($i*8)+$j) < sizeof($data->list)); $j++){
				$tt += (int)($data->list[($i*8)+$j]->main->temp) - 273.15;
				if(isset($data->list[($i*8)+$j]->rain) && isset($data->list[($i*8)+$j]->rain->{'3h'}))
					$sr += (float)($data->list[($i*8)+$j]->rain->{'3h'});
				$s = $j;
			}
			$res[$i]['temp'] = round(($tt/$s), 1);    // average temperature per day, C
			$res[$i]['fallout'] = round($sr, 2);   // summary fallout per day, mm
		}
	}
	
	return $res;
}

function get_forecast_by_id($id){
	$q = "http://api.openweathermap.org/data/2.5/forecast?id=$id&appid=".apiid;
	$j = file_get_contents($q);
	$data = json_decode($j);
	if(((int)$data->cod / 100) == 4){
		throw new Exception('Error!!');
		echo 'ERROR!!';
	}
	
	return weather_format($data);
}

function get_forecast_by_coord($lat, $lon){
	$q = "http://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lon&appid=".apiid;
	$j = file_get_contents($q);
	if(!$j){
		throw new Exception('Error!!');
		echo 'ERROR!!';
	}
	$data = json_decode($j);

	return weather_format($data);
}

function get_forecast_by_name($name){
	$c = find_city($name);
	return get_forecast_by_id($c['id']);
}

?>