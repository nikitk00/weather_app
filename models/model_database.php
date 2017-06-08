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

function get_city_by_name($link, $name){
	return null;
}

?>