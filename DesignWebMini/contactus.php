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
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <link rel="stylesheet" type="text/css" href="css/contactuscss.css">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php 
                    require_once './headerpage.php';
                ?>
            </div>
            <div class="topnav">
                <a href="index.php">Home</a>
                <a href="User/userlogin.php">User</a>
                <a href="Vendor/vendorlogin.php">Vendor</a>
                <a href="contactus.php">Contact Us</a>
                <a href="aboutus.php">About Us</a>
            </div>
            <div class="contactdiv">
                <div style="float: left; margin-top: 10px; width: 45%;">
                    <div style="margin-left: 25%; margin-top: 20%">
                         <?php
                            if(isset($_POST['name'])){
                                ?>
                                <center>
                                        <label>Successfully Submitted...</label>
                                </center>
                                <?php
                            }
                        ?>
                        <form action="contactus.php" method="POST">
                        <table>
                            <tr>
                                <td>Name </td>
                                <td><input type="text" name="name" id="cname" required/></td>
                            </tr>
                            <tr>
                                <td>Contact </td>
                                <td><input type="tel" name="contact" id="ctel" required/></td>
                            </tr>
                            <tr>
                                <td>Suggestion</td>
                                <td>
                                    <textarea cols="21" rows="5" name="csuggest" id="csuggest" required></textarea> 
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><input type="submit" value="submit" name="submit"/></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                
                <div style="float: left; margin-left: 30px; width: 50%">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59067.261916985444!2d70.76014920000003!3d22.289204700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1522588006416"
                         width="100%"
                         height="500"
                         frameborder="" 
                         style="border:0; margin: 10px;"></iframe>
                </div>
            </div>
            <div class="footer">
                <?php
                    require_once './footerpage.php';
                ?>
            </div>
        </div>
    </body>
</html>