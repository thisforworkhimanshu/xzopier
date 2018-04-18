<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['vname'])){
    $vname = $_POST['vname'];
    $vpass = $_POST['vpass'];
    $firmname = $_POST['vfirmname'];
    $vemail = $_POST['vemail'];
    $vmobile = $_POST['vmobile'];
    $addressone = $_POST['addressone'];
    $addresstwo = $_POST['addresstwo'];
    $addressthree = $_POST['addressthree'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    
    $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
    
    if(!$conn){
        die("Connection Failed".mysqli_connect_error());
    }
    
    $sql ="INSERT INTO `vendor_tb` (`vendor_id`, `vendor_name`, `vendor_pass`) VALUES (NULL, '".$vname."','".$vpass."')";
//    $sql = "insert into user_sigup_tb(user_name,user_pass) values('".$uname.",'".$upass."')";
    
    if (mysqli_query($conn, $sql)){
        
        $last_id = mysqli_insert_id($conn);
        
        $query = "INSERT INTO vendor_detail(`vendor_id`,`firm_name`,`email`,`mobile`,`address_one`,`address_two`,`address_three`,`city`,`state`) VALUES('".$last_id."','".$firmname."','".$vemail."','".$vmobile."','".$addressone."','".$addresstwo."','".$addressthree."','".$city."','".$state."')";
        
        if(mysqli_query($conn, $query)){
            session_start();
            $_SESSION['signup_status_vendor']=true;
            header("Location: signupvendor.php");
        }
    }
    
}
