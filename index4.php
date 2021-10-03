<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db_name = 'sql';

$link = mysqli_connect($host, $user, $pass, $db_name);
mysqli_query($link, "SET NAMES 'utr8'");


/****************************
    Insert 20 users end Son ID
****************************/  

// for($i = 1; $i <= 40; $i++){

//     $name = 'User ' . $i;

//     if($i == 1) {
//         $fatherId = 1;
//     } else {
//         $fatherId = rand(1, $i - 1);
//     }   

//     $query = "INSERT INTO family (name, father_id) VALUE ('$name', '$fatherId')";

//     mysqli_query($link, $query) or die(mysqli_error($link));
    
// }

$query = "SELECT family.name as son_name,
            fathers.name as father_name
            FROM
            family
            LEFT JOIN family as fathers ON fathers.id=family.father_id";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

var_dump($data);