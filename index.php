<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db_name = 'sql';

$link = mysqli_connect($host, $user, $pass, $db_name);
mysqli_query($link, "SET NAMES 'utr8'");

$query = "SELECT 
        from_cities.name as from_city_name,
        to_cities.name as to_city_name
        FROM
        routes
        LEFT JOIN cities as from_cities
        ON from_cities.id=routes.from_city_id
        LEFT JOIN cities as to_cities
        ON to_cities.id=routes.to_city_id";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

foreach($data as $route){

    echo 'road from the city ' . $route['from_city_name'] . ' to ' . $route['to_city_name'] . '<br>';
}      