<?php
require_once('api_requests.php');
$city = find_city($_POST['city']);

include 'views/view_forecast.php';
?>