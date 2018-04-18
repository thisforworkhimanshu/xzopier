<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <link rel="stylesheet" type="text/css" href="css/mainbodydivcss.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php 
                    require_once './headerpage.php';
                ?>
            </div>
            <div class="topnav">
                <a class="active" href="index.php">Home</a>
                <a href="User/userlogin.php">User</a>
                <a href="Vendor/vendorlogin.php">Vendor</a>
                <a href="contactus.php">Contact Us</a>
                <a href="aboutus.php">About Us</a>
            </div>

            <!--<div class="row">
                    <div class="column side">
                      <h2>How we Work</h2>
                      <p>&rArr; Collects Soft Copy of <em>document.</em></p>
                      <p>&rArr; Instantly it is transfered to your preferred vendor which you have selected.</p>
                      <p>&rArr; In between you felt that you <strong>don't want to copy, </strong>you can cancel your order by just clicking cancel.</p>
                      <p>&rAarr; We also show you status of your order i.e pending or completed.</p>
                      <p>&rAarr; If your status gets completed then you can collect your copies from your vendor.</p>
                      <p>&rArr; If status is set to completed then you <strong>can't cancel</strong> your order.</p>
                      <p>&rArr; It's much simple than you think of getting copy of your document.</p>
                      <marquee width="100%" direction="left">We are coming with <strong> new features soon</strong></marquee>
                    </div>
                    <div class="column middle" style="text-align: center;">
                      <h2>Our Satisfied Customers</h2>
                      <marquee width="100%" direction="left"><strong>Card/Image of Happy Customer are show with SlideShow</strong></marquee>
                    </div>
                    <div class="column side">
                      <h2>Most Demanding Vendors</h2>
                      <marquee width="100%" direction="left"><strong>Vendors List Appears Here</strong></marquee>
                    </div>
                </div>-->
            
            <div class="middlecontent">
                <div id="banner">
                    <div id="bannerimg">
                        <img src="img/home-banner-text.png" alt="Banner Image" width="1100" height="527">
                    </div>
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
