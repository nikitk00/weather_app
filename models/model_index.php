<?php

require_once('model_database.php');
$link = db_connect();

$apiid = "711adf2f4a53502b33d9632b78518c63";


//$j = file_get_contents('./resources/city.list.json', FILE_USE_INCLUDE_PATH);

$cities = array();

set_time_limit(0);


$j = file_get_contents('./resources/city.list.json', FILE_USE_INCLUDE_PATH, NULL, 0, filesize('./resources/city.list.json'));

echo "<br>"."<br>";

ini_set('memory_limit', '-1');//!!!!!!!!!!!!!warning!be carefull with it

$tmp = json_decode($j);

$cts = (array)$tmp;




//echo sizeof($cts).'<br><br>';


echo get_city_by_id($link, 820073)['name'].'<br>';
echo get_city_by_name($link, 'Федоровка')['id'].'<br>';



$j = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=1851632&appid='.$apiid);
$data = json_decode($j);

//var_dump($data);

echo $data->cod.'<br>';
echo $data->city->id.'<br>';
echo $data->city->name.'<br>';
echo $data->city->country.'<br>';
echo $data->list[1]->main->temp.'<br><br>';
echo $data->city->coord->lon.'<br>';
echo $data->city->coord->lat.'<br>';
echo $data->cod.'<br>';

//var_dump($data);



//$doc = new DOMDocument;
//$doc->loadHTMLFile("http://samples.openweathermap.org/data/2.5/forecast?id=524901&appid=b1b15e88fa797225412429c1c50c122a1");
//$data = $doc->getElementsByTagName('pre');
//
////var_dump($doc);
//echo $data;



?>