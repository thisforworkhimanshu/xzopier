<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $_GET['file_id'];

echo "<br/>".$_GET['price'];

if(isset($_GET['file_id'])&& isset($_GET['price'])){
    $file_id = $_GET['file_id'];
    $price = $_GET['price'];
    $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
    if(!$conn){
        die("Connection Error");
    }

    $sql = "UPDATE `file_tb` SET `price` = '".$price."' WHERE `file_tb`.`unique_file_id` = '".$file_id."';";

    if(mysqli_query($conn, $sql)){
        header("Location: http://localhost/DesignWebMini/Vendor/vendorrevieworder.php");
    }
}


