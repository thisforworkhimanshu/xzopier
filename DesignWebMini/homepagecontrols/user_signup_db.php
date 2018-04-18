<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['uname'])){
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];
    $uemail = $_POST['uemail'];
    $umobile = $_POST['umobile'];
    $addressone = $_POST['addressone'];
    $addresstwo = $_POST['addresstwo'];
    $addressthree = $_POST['addressthree'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    
    $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
    
    if(!$conn){
        die("Connection Failed".mysqli_connect_error());
    }
    
    $sql ="INSERT INTO `user_sigup_tb` (`user_id`, `user_name`, `user_pass`) VALUES (NULL, '".$uname."','".$upass."')";
//    $sql = "insert into user_sigup_tb(user_name,user_pass) values('".$uname.",'".$upass."')";
    
    if (mysqli_query($conn, $sql)){
        
        $last_id = mysqli_insert_id($conn);
        
        $query = "INSERT INTO user_detail(`user_id`,`email`,`mobile`,`address_one`,`address_two`,`address_three`,`city`,`state`) VALUES('".$last_id."','".$uemail."','".$umobile."','".$addressone."','".$addresstwo."','".$addressthree."','".$city."','".$state."')";
        
        if(mysqli_query($conn, $query)){
            session_start();
            $_SESSION['signup_status']=true;
            header("Location: signupuser.php");
        }
    }
    
}

