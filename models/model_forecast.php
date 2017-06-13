<?php
require_once('api_requests.php');
require_once('model_database.php');
$city = find_city($_GET['city']);
if(isset($city['id'])){
	$_GET['city'] = $city['name'];
	$link = db_connect();
	if(db_check_by_name($link, $city['name'])){ //in case success find, get data from db
		$report = weather_separator(db_get_forecast_by_name($link, $city['name']));
	} else{ //get data using API and push it in db
		$f = get_forecast_by_name($city['name']);
		$report = weather_separator(weather_merger($f, $city));
		db_push_forecast($link, weather_merger($f, $city));
	}

	include '../views/view_forecast.php';
}
else include '../views/view_404.php'
?>