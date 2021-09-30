<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db_name = 'sql';

$link = mysqli_connect($host, $user, $pass, $db_name);
mysqli_query($link, "SET NAMES 'utr8'");

/****************************
    Insert 10 users 
****************************/  
// for($i = 1; $i <= 10; $i++){

//     $value = 'user ' . $i;

//     $query = "INSERT INTO users (name) VALUE ('$value')";
//     mysqli_query($link, $query) or die(mysqli_error($link));
// }
/****************************
    Insert 20 cities 
****************************/ 
// for($i = 1; $i <= 20; $i++){

//     $value = 'city ' . $i;

//     $query = "INSERT INTO cities (name) VALUE ('$value')";
//     mysqli_query($link, $query) or die(mysqli_error($link));
// }

/****************************
    Insert 30 connections user whis cities
****************************/ 
// for($i = 1; $i <= 30; $i++){

//     $cityId = rand(1, 20);
//     $userId = rand(1, 10);

//     $query = "INSERT INTO connection (user_id, city_id) VALUE ('$userId', '$cityId')";
//     mysqli_query($link, $query) or die(mysqli_error($link));

// }  

// ****************************************************

    $query = "SELECT 
            users.name as user_name,
            cities.name as city_name
            FROM users 
            LEFT JOIN connection ON connection.user_id=users.id
            LEFT JOIN cities ON connection.city_id=cities.id";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    sort($data);

    $res = [];
    foreach($data as $elem){
        $res[$elem['user_name']][] = $elem['city_name'];
    }

    
    foreach($res as $value => $key){
        
        echo $value;
        echo "<ul>";
            if(is_array($key)){
                foreach($key as $value){
                    echo "<li>{$value}</li>";
                }
            }
        echo "</ul><br>";

    }
