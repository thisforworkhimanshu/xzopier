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
    </head>
    <body>
<!--        <div style="display: none; width: 100%; " id="showit" align="center">
            <div style="width: 30%">
                <form>
                    <input id="showitemail" type="email" name="email" required placeholder="Email id" style="border: none; width: 100%; margin: 0; ">
                    <hr style="margin: 1px;"/>
                    <textarea id="showitdesc" cols="20" rows="10" required placeholder="Enter your suggestions" style="border: none; width: 100%;"></textarea>
                </form>
            </div>
        </div>-->
        
        <div style="float: left;">
            <label style="font-size: 1vw;">Copyright &copy; <?php echo date("Y"); ?></label>
        </div>
        
        <div style="float: left;">
            <a href="#" style="font-size: 1vw; margin-left: 30px; text-decoration: none; color: #333;">Sitemap</a>
        </div>
        
        <div style="float: left;">
             <a href="#" style="font-size: 1vw; margin-left: 30px; text-decoration: none; color: #333;">Privacy Policy</a>
        </div>
        
        <div style="float: left;">
             <a href="#" style="font-size: 1vw; margin-left: 30px; text-decoration: none; color: #333;">Terms and Condition</a>
        </div>
        
        <div style="float: left;">
             <a href="#" style="font-size: 1vw; margin-left: 30px; text-decoration: none; color: #333;">Contact</a>
        </div>
        
<!--        <div style="float: left; margin-left: 30px;">
            <label>//<?php echo date("d/M/Y"); ?></label>
        </div>-->
        
        <div style="float: left; margin-left: 30px;">
            <a href="#" style=" font-size: 1vw; text-decoration: none; color: #333;" onclick="showdiv()">What we can Offer More?</a>
            <script>
                    function showdiv(){
                        document.getElementById('showit').style.display="block";
                    }
            </script>
        </div>
        
        <div style="float: right;">
            <form>
                <input type="email" name="subemail" required style="height: 20.9px; border: none;" placeholder="Email Please">
                <input type="submit" value="Subscribe" style="border-radius: 50px 50px; border-style: dotted;">
            </form>
        </div>
    </body>
</html>
