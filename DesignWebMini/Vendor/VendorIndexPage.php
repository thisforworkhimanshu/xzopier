<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['vname']) && isset($_SESSION['status'])){    
        $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
        if(!$conn){
            die("Connection Failed");
        }
        
        $sql = "select * from file_tb where vendor_id = '".$_SESSION['vid']."'";
        $result = mysqli_query($conn, $sql);
        $complete=0;
        $pending=0;
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                if($row['iscompleted']==="complete"){
                    $complete+=1;
                }else if($row['iscompleted']==="pending"){
                    $pending+=1;
                }
            }
        }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/vendorheadercss.css">
        <link rel="stylesheet" type="text/css" href="../css/vendorindexcss.css">
    </head>
    <body>
         <div class="header">
            <?php 
                require_once '../Vendor/VendorHeader.php';
            ?>
        </div>
        <div class="topnav">
            <?php require_once '../Vendor/vendornavbar.php';?>
        </div>
        <div class="container">
            <div class="showhome">
                <label id="lblmsg">Hello! ઉદ્યોગપતિ <?php echo $_SESSION['vname']; ?> </label>
            </div>
            <div class="showpenddet">
                <label id="lbldet">Pending Orders are in cout : No. <?php echo $pending;?> </label>
            </div>
            <div class="showcmpddet">
                <label id="lblcmpdet">Completed Orders are in cout : No. <?php echo $complete;?> </label>
            </div>
        </div>
    </body>
</html>
<?php
    }else{
         header("Location: http://localhost/DesignWebMini/index.php");
    }