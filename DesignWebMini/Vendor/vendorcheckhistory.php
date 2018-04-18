<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if(isset($_SESSION['vname'])){
     $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
        if(!$conn){
            die("Connection Failed");
        }
        
        $sql = "select * from file_tb where vendor_id = '".$_SESSION['vid']."' and iscompleted = 'complete'";
        $result = mysqli_query($conn, $sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/vendorheadercss.css">
        <link rel="stylesheet" type="text/css" href="../css/vendorhistorycss.css">
        <title></title>
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
            <div class="listorder">
                <?php
                    if(mysqli_num_rows($result)>0){
                        while($row= mysqli_fetch_assoc($result)){
                            ?>
                                <div class="orderdet">
                                    <div class="orderpart1">
                                        <label>Order Id : <?php echo $row['unique_file_id']; ?></label>
                                    </div>
                                    <div class="orderpart2">
                                        <label>Paper Type : <?php echo $row['paper_size'];?></label>
                                        <br/>
                                        <label>Color Type : <?php echo $row['color_type'];?></label>
                                        <br/>
                                        <label>No. of copies : <?php echo $row['no_copies'];?></label>
                                    </div>  
                                    <div class="orderpart3">
                                        <label>Amount : <?php echo $row['price'] ?></label>
                                    </div>
                                </div>
                                <br/>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>
<?php
}