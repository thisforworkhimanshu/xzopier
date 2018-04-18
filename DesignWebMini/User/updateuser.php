<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['uname'])){
    session_start();
    $uid = $_SESSION['uid'];
    
    $username = $_POST['uname'];
    $userpass = $_POST['upass'];
    $umobile = $_POST['umobile'];
    $uemail = $_POST['uemail'];
    $addressone = $_POST['addressone'];
    $addresstwo = $_POST['addresstwo'];
    $addressthree = $_POST['addressthree'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    
    $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
    if (!$conn){
        die("Connection Failed ".mysqli_connect_error());
    }
    
    $sql = "UPDATE `user_sigup_tb` SET `user_name`='".$_POST['uname']."',`user_pass`='".$_POST['upass']."' WHERE `user_id` = '".$uid."'";
    
    if (mysqli_query($conn, $sql)){
        $sqlq = "update user_detail set email = '".$uemail."' , mobile = '".$umobile."' , address_one = '".$addressone."' ,"
                . "address_two = '".$addresstwo."' , address_three = '".$addressthree."' , city = '".$city."' , state = '".$state."'"
                . "where user_id = '".$uid."'";
        
        if(mysqli_query($conn, $sqlq)){
            session_start();
            $_SESSION['update_status'] = true;
            header("Location: userprofile.php");
        }
    }
}