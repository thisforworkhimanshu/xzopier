<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['uname'])){
    session_start();
    $vid = $_SESSION['vid'];
    
    $username = $_POST['uname'];
    $userpass = $_POST['upass'];
    $firmname = $_POST['firmname'];
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
    
    $sql = "UPDATE `vendor_tb` SET `vendor_name`='".$username."',`vendor_pass`='".$userpass."' WHERE `vendor_id` = '".$vid."' ";
    
    if (mysqli_query($conn, $sql)){
        $sqlq = "UPDATE `vendor_detail` SET `firm_name`='".$firmname."',`email`='".$uemail."',`mobile`='".$umobile."',`address_one`='".$addressone."',`address_two`='".$addresstwo."',`address_three`='".$addressthree."',`city`='".$city."',`state`='".$state."' WHERE `vendor_id` = '".$vid."'";
        
        if(mysqli_query($conn, $sqlq)){
            $_SESSION['update_status_vendor'] = true;
            header("Location: vendorprofile.php");
        }
    }
}