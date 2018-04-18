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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "phpminizerox";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if(isset($_POST['uname']) && isset($_POST['upass'])){
                $sql = "SELECT * FROM user_sigup_tb WHERE user_name = '".$_POST['uname']."' AND user_pass = '".$_POST['upass']."'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        session_start();
                        $_SESSION['uid'] = $row['user_id'];
                        $_SESSION['uname'] = $_POST['uname'];
                        $_SESSION['status']=true;
                        header("Location: UserIndexPage.php");
                    }
                } else {
                    ?>
                        <h2 style="margin-top: 15%; margin-left: 30%;">Incorrect Details! Check Again</h2><br/>
                        <h4 style="margin-left: 30%;">Redirecting... Please wait!</h4>
                        <script>
                            setTimeout("location.href = 'http://localhost/DesignWebMini/User/userlogin.php';",1500);
                        </script>
                    <?php
                }
            } else {
                header("Location: http://localhost/DesignWebMini/index.php");
            }
            mysqli_close($conn);
        ?>
    </body>
</html>
