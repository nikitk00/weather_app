<?php
require_once('api_requests.php');
$city = find_city($_POST['city']);
//var_dump($city);
$report = get_forecast_by_name($city['name']);
//var_dump($report);

include '../views/view_forecast.php';
?>