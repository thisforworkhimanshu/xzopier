<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/userheader.css">
        <link rel="stylesheet" type="text/css" href="../css/cancelordercss.css">
        <title></title>
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
        <form action="cancleorder_db.php" method="post" name="cancelForm" id="cancelForm">
            <div class="container">
                    <?php
                        session_start();
                        if(isset($_SESSION['cancel_status'])){
                            if($_SESSION['cancel_status']==="yes"){
                                ?>
                                <center>
                                    <label>Order Canceled</label>
                                </center>
                                <?php
                                unset($_SESSION['cancel_status']);
                            }else if($_SESSION['cancel_status']==="no"){
                                ?>
                                <center>
                                    <label>Order Not Found or Something went wrong!</label>
                                </center>
                                <?php
                                unset($_SESSION['cancel_status']);
                            }
                        }
                    ?>
                <div class="canceldiv">
                    <hr/>
                    <input id="txtinputid" type="text" name="orderidcancel" required placeholder="Order Id">
                    <hr/>
                    <input id="reasoncancel" type="text" name="reasoncancel" required placeholder="Reason to Cancel order">
                    <hr/>
                    <input id="cancelbtn" type="submit" value="Submit" onclick="suretocancel()">
                    <script type="text/javascript">
                        function suretocancel(){
                            var r = confirm("Are you sure to cancel order?");
                            if(r===true){
                                document.getElementById('cancelForm').submit();
                            }else{
                                window.location.href='cancleorder.php';
                            }
                        }
                    </script>
                </div>
            </div>
        </form>
    </body>
</html>
