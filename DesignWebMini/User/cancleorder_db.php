<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['orderidcancel'])){
    $orderid = $_POST['orderidcancel'];
    
    $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
    if(!$conn){
        die("Connection Failed");
    }
    session_start();
    $sql = "DELETE FROM `file_tb` where `unique_file_id` = '".$orderid."' and `user_id`='".$_SESSION['uid']."' and `iscompleted`='pending'";
    
    mysqli_query($conn, $sql);
    $rowaff = mysqli_affected_rows($conn);
            
    if($rowaff>0){
        $_SESSION['cancel_status']="yes";
        header("Location: cancleorder.php");
    }else{
        $_SESSION['cancel_status']="no";
        header("Location: cancleorder.php");
    }
}