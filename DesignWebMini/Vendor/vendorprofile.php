<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['vid']) || isset($_SESSION['vname'])){
        $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
        if(!$conn){
            die("Connection Failed ".mysqli_connect_error());
        }
        $sql = "select * from vendor_tb where vendor_id = '".$_SESSION['vid']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $username = $row['vendor_name'];
            $userpass = $row['vendor_pass'];
        }
        $query = "select * from vendor_detail where vendor_id = '".$_SESSION['vid']."'";
        $resultquery = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultquery)>0){
            while($rowq = mysqli_fetch_assoc($resultquery)){
                $firmname = $rowq['firm_name'];
                $email = $rowq['email'];
                $mobile = $rowq['mobile'];
                $addressone = $rowq['address_one'];
                $addresstwo = $rowq['address_two'];
                $addressthree = $rowq['address_three'];
                $city = $rowq['city'];
                $state = $rowq['state'];
            }
        }
    }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/vendorheadercss.css">
        <link rel="stylesheet" type="text/css" href="../css/vendorprofilecss.css">
        <title></title>
        <script type="text/javascript">
            function readonlyfunc(){
                document.getElementById('vname').setAttribute('readonly','readonly');
                document.getElementById('vpass').setAttribute('readonly','readonly');
                document.getElementById('vemail').setAttribute('readonly','readonly');
                document.getElementById('firmname').setAttribute('readonly','readonly');
                document.getElementById('vmobile').setAttribute('readonly','readonly');
                document.getElementById('addressone').setAttribute('readonly','readonly');
                document.getElementById('addresstwo').setAttribute('readonly','readonly');
                document.getElementById('addressthree').setAttribute('readonly','readonly');
                document.getElementById('city').setAttribute('readonly','readonly');
                document.getElementById('state').setAttribute('readonly','readonly');
            }
        </script>
    </head>
    <body onload="readonlyfunc()">
         <div class="header">
            <?php 
                require_once '../Vendor/VendorHeader.php';
            ?>
        </div>
        <div class="topnav">
            <?php require_once '../Vendor/vendornavbar.php';?>
        </div>
        <div class="container">
            <?php
                if(isset($_SESSION['update_status_vendor'])){
                    if($_SESSION['update_status_vendor']){
                        $_SESSION['update_status_vendor']=false;
                        ?>
                        <center>
                            <label>Successfully Updated!</label>
                        </center>
                        <?php
                        }
                    }
                ?>
            <form action="updatevendor.php" method="post">
             <div class="profile">
                <hr/>
                <input id="vname" type="text" name="uname" required placeholder="Username" value="<?php echo $username; ?>">
                <hr/>
                <input id="vpass" type="password" name="upass" required placeholder="Password" value="<?php echo $userpass; ?>" >
                <hr/>
                <input id="firmname" type="tel" name="firmname" required placeholder="Firm Name" value="<?php echo $firmname; ?>" >
                <hr/>
                <input id="vemail" type="email" name="uemail" required placeholder="Email Address" value="<?php echo $email; ?>">
                <hr/>
                <input id="vmobile" type="tel" name="umobile" required pattern="[0-9]{10}" placeholder="Mobile Number" value="<?php echo $mobile; ?>">
                <hr/>
                
                <input id="addressone" type="text" name="addressone" required placeholder="Address Line 1 eg. House/Flat Number" value="<?php echo $addressone; ?>">
                <hr/>
                <input id="addresstwo" type="text" name="addresstwo" required placeholder="Address Line 2 eg. House Name/Flat Name" value="<?php echo $addresstwo; ?>">
                <hr/>
                <input id="addressthree" type="text" name="addressthree" required placeholder="Address Line 3 eg. Society Name/Landmark" value="<?php echo $addressthree; ?>">
                <hr/>
                <input id="city" type="text" name="city" required placeholder="City" value="<?php echo $city; ?>">
                <hr/>
                <input id="state" type="text" name="state" required placeholder="State" value="<?php echo $state; ?>">
                <hr/>
                <input type="button" id="btnedit" value="Edit" onclick="makeeditable()">
                <input type="submit" id="btnupdate" value="Update" style="display: none;" >
                <script type="text/javascript">
                    function makeeditable(){
                        document.getElementById('btnedit').style.display="none";
                        document.getElementById('btnupdate').style.display="block";
                        document.getElementById("vname").removeAttribute('readonly');
                        document.getElementById('vpass').removeAttribute('readonly');
                        document.getElementById('vemail').removeAttribute('readonly');
                        document.getElementById('firmname').removeAttribute('readonly');
                        document.getElementById('vmobile').removeAttribute('readonly');
                        document.getElementById('addressone').removeAttribute('readonly');
                        document.getElementById('addresstwo').removeAttribute('readonly');
                        document.getElementById('addressthree').removeAttribute('readonly');
                        document.getElementById('city').removeAttribute('readonly');
                        document.getElementById('state').removeAttribute('readonly');
                    }
                </script>
            </div>
            </form>
        </div>
    </body>
</html>
