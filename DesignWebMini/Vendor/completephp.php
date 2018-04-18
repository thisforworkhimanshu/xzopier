<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(isset($_GET['id'])){
        $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
        if(!$conn){
            echo "Connection error". mysqli_connect_error();
        }else{
            $id = $_GET['id'];
            echo $id;
            $sql = "UPDATE file_tb SET iscompleted='complete' WHERE unique_file_id=$id";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_affected_rows($conn);
            if($rows>0){
                ob_start();
                header("Location: http://localhost/DesignWebMini/Vendor/vendorrevieworder.php");
                ob_flush();
                exit();
            }else{
                echo "Error in updating";
            }
        }
        mysqli_close($conn);
    }else{
        header("Location : http://localhost/DesignWebMini/Vendor/vendorrevieworder.php");
    }
