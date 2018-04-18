<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if (isset($_SESSION['uname'])){
        $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
        if(!$conn){
            die("Connection Failed");
        }
        
        $sql = "select * from file_tb where user_id = '".$_SESSION['uid']."'";
        $result = mysqli_query($conn, $sql);
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/userheader.css">
        <link rel="stylesheet" type="text/css" href="../css/orderhistorycss.css">
    </head>
    <body>
        <div class="header">
            <?php 
                require_once '../User/UserHeader.php';
            ?>
        </div>
        <div class="topnav">
            <?php require_once '../User/usernavbar.php';?>
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
                                    <div style="position: absolute; margin-left: 45%;">
                                        <label>Status: <?php
                                            echo $row['iscompleted'];
                                        ?></label>
                                    </div>
                                    <div class="orderpart2">
                                        <label>Paper Type : <?php echo $row['paper_size']; ?></label>
                                        <br/>
                                        <label>Color Type : <?php echo $row['color_type']; ?></label>
                                        <br/>
                                        <label>No. of Copies : <?php echo $row['no_copies']; ?></label>
                                    </div>  
                                    <div class="orderpart3">
                                        <label>Amount by vendor : <?php 
                                        if($row['price']==0){
                                            echo 'Pending';
                                        }else{
                                            echo $row['price'];
                                        }
                                         ?></label>
                                    </div>
                                </div>
                                <br/>
                            <?php
                        }
                    }
                ?>
<!--                <div class="orderdet">
                    <div class="orderpart1">
                        <label>Order Id</label>
                    </div>
                    <div class="orderpart2">
                        <label>Order Desc like paper size,colored,no of copies</label>
                        <br/>
                        <label>ppr</label>
                    </div>  
                    <div class="orderpart3">
                        <label>Amount by vendor</label>
                    </div>
                </div>
                <br/>-->
<!--                <div class="orderdet">
                    <div class="orderpart1">
                        <label>Order Id</label>
                    </div>
                    <div class="orderpart2">
                        <label>Order Desc like paper size,colored,no of copies</label>
                    </div>  
                    <div class="orderpart3">
                        <label>Amount by vendor</label>
                    </div>
                </div>
                <br/>
                <div class="orderdet">
                    <div class="orderpart1">
                        <label>Order Id</label>
                    </div>
                    <div class="orderpart2">
                        <label>Order Desc like paper size,colored,no of copies</label>
                    </div>  
                    <div class="orderpart3">
                        <label>Amount by vendor</label>
                    </div>
                </div>
                <br/>
                <div class="orderdet">
                    <div class="orderpart1">
                        <label>Order Id</label>
                    </div>
                    <div class="orderpart2">
                        <label>Order Desc like paper size,colored,no of copies</label>
                    </div>  
                    <div class="orderpart3">
                        <label>Amount by vendor</label>
                    </div>
                </div>
                <br/>
                <div class="orderdet">
                    <div class="orderpart1">
                        <label>Order Id</label>
                    </div>
                    <div class="orderpart2">
                        <label>Order Desc like paper size,colored,no of copies</label>
                    </div>  
                    <div class="orderpart3">
                        <label>Amount by vendor</label>
                    </div>
                </div>-->
            </div>
        </div>
    </body>
</html>
    <?php
}