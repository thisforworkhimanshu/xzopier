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
        <?php
            session_start();
            $_SESSION['status'] = false; 
            session_unset($_SESSION['status']);
            session_unset($_SESSION['vname']);
            session_destroy();
            header("Location: http://localhost/DesignWebMini/index.php");
        ?>
    </body>
</html>
