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



$temp = $cts[0];
echo sizeof($cts).'<br><br>';

for($i = 0; $i < sizeof($cts); $i++){
//	add_city($link, $cts[$i]->id, $cts[$i]->name, $cts[$i]->country, $cts[$i]->coord->lon, $cts[$i]->coord->lat) ;
//	echo $i.'<br>';
}
//for($i = (sizeof($cts)/2+1); $i < sizeof($cts); $i++){
//	echo $cts[$i]->code.'<br>';	
//}



//var_dump($cts);

//for($i = 0; $i < count($cts); $i++){
//	foreach($cts[$i] as $a){
////		var_dump($a);
////		echo '<br>';
//	}
//	echo '<br>'.$i. '<br>';
//}





//var_dump($cities);


//$j = file_get_contents( __DIR__ . ".." . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR .  'data.json' );
//$data = json_decode($j); 
//var_dump($data);


$j = file_get_contents('http://samples.openweathermap.org/data/2.5/forecast?id=524901&appid=$apiid');
$data = json_decode($j);






//$doc = new DOMDocument;
//$doc->loadHTMLFile("http://samples.openweathermap.org/data/2.5/forecast?id=524901&appid=b1b15e88fa797225412429c1c50c122a1");
//$data = $doc->getElementsByTagName('pre');
//
////var_dump($doc);
//echo $data;



?>