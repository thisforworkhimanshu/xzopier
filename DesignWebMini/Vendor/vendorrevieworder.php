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
    
    $sql = "select * from file_tb where vendor_id = '".$_SESSION['vid']."' and iscompleted = 'pending'";
    $result = mysqli_query($conn, $sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/vendorheadercss.css">
        <link rel="stylesheet" type="text/css" href="../css/vendorrevieworder.css">
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
            <div class="orderdet">
                <table rules="rows">
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>File Name</th>
                        <th>Page Type</th>
                        <th>Color Type</th>
                        <th>No of Copies</th>
                        <th>Price</th>
                        <th>Download</th>
                        <th>Click if Completed</th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($result)>0){
                            while ($row= mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['unique_file_id'];?></td>
                                        <td><?php
                                            $query = "select user_name from user_sigup_tb where user_id = '".$row['user_id']."'";
                                            $result = mysqli_query($conn, $query);
                                            if(mysqli_num_rows($result)==1){
                                                while($rowq = mysqli_fetch_assoc($result)){
                                                    echo  $rowq['user_name'];
                                                }
                                            }
                                        ?></td>
                                        <td><?php echo $row['orig_file_name']; ?></td>
                                        <td><?php echo $row['paper_size'];?></td>
                                        <td><?php echo $row['color_type'];?></td>
                                        <td><?php echo $row['no_copies'];?></td>
                                        <td>
                                            <script type="text/javascript">
                                                function checkVal(){
                                                    var x = document.getElementById('price').value;
                                                    if(isNaN(x) || x===null || x==="" ){
                                                        alert('Must insert Number');
                                                    }else{
                                                        document.forms['priceForm'].submit();
                                                    }
                                                }
                                                
                                            </script>
                                            <?php
                                                $price= $row['price'];
                                            ?>
                                            <form action="enterprice.php" method="get" name="priceForm">
                                                <input type="hidden" name="file_id" value="<?php echo $row['unique_file_id'];?>"/>
                                                <input type="text" name="price" id="price" style="width: 50%;" value="<?php echo $price;?>" required onblur="checkVal()"/>
                                            </form>
                                        </td>
                                        <td><a href="http://localhost/DesignWebMini/Vendor/pdf_server.php?file=<?php echo $row['file_name'];?>">Click</a></td>
                                    <script type="text/javascript">
                                        function check(){
                                            var x = document.getElementById('price').value;
                                            if(x<1){
                                                alert('Price Must be Greate than 0');
                                                return false;
                                            }else{
                                                return true;
                                            }
                                            
                                            
                                        }
                                    </script>
                                        <td><a href="http://localhost/DesignWebMini/Vendor/completephp.php?id=<?php echo $row['unique_file_id'];?>" onclick=" return check()">Click</a></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
<?php
}else{
    header("Location: http://localhost/DesignWebMini/index.php");
}
