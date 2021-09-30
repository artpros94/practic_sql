<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db_name = 'sql';

    $link = mysqli_connect($host, $user, $pass, $db_name);
    mysqli_query($link, "SET NAMES 'utr8'");

   


    //     // INSERT 50 PRODUCTS WITH NAME AND SUBCATEGORY ID
    // for($i = 1; $i <= 50; $i++){

    //     $value = 'product ' . $i;
    //     $rand =  rand(1, 20);

    //     $query = "INSERT INTO products (name, subcat_id) VALUE ('$value', '$rand')";
    //     mysqli_query($link, $query) or die(mysqli_error($link));
    // }

    //  // INSERT 20 subCategory WITH NAME AND CAT ID
    // for($i = 1; $i <= 20; $i++){

    //     $value = 'subCategory ' . $i;
    //     $rand =  rand(1, 10);

    //     $query = "INSERT INTO subcategory (name, cat_id) VALUE ('$value', '$rand')";
    
    //     mysqli_query($link, $query) or die(mysqli_error($link));
    // }

    //  // INSERT 10 subCategory WITH NAME AND CAT ID
    // for($i = 1; $i <= 10; $i++){

    //     $value = 'category ' . $i;
    //     $query = "INSERT INTO categorys (name) VALUE ('$value')";
    
    //     mysqli_query($link, $query) or die(mysqli_error($link));
    // }


$query = "SELECT products.name as prod_name,
                subcategory.name as subcat_name,
                categorys.name as cat_name 
                FROM products 
                LEFT JOIN subcategory ON  products.subcat_id=subcategory.id
                LEFT JOIN categorys ON subcategory.cat_id=categorys.id";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);


    foreach($data as $prod){
        echo $prod['prod_name'] . ' end they subCategory is ' . $prod['subcat_name'] . ' end cat ' . $prod['cat_name'] . '<br>';
    }