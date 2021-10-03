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

// for($i = 1; $i <= 20; $i++){

//     $user = 'User ' . $i;

//     if($i == 1) {
//         $sonId = 1;
//     } else {
//         $sonId = rand(1, $i - 1);
//     }   

//     $query = "INSERT INTO family_tree (user, son_id) VALUE ('$user', '$sonId')";

//     mysqli_query($link, $query) or die(mysqli_error($link));
    
// }



$query = "SELECT family_tree.user as son, sons.user as father
            FROM family_tree
            LEFT JOIN family_tree as sons ON sons.id=family_tree.son_id";


$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);



foreach($data as $fatherSon){
    if($fatherSon['father'] == null) {
        echo 'Forefather is ' .  $fatherSon['son'] .'<br>';
    } else {
        echo 'Father ' . $fatherSon['father'] . ' end they son is ' . $fatherSon['son']. '<br>';
    }

}





