<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['status'])){    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/userheader.css">
        <link rel="stylesheet" type="text/css" href="../css/UserIndexCss.css">
    </head>
    <body>
         <div class="header">
            <?php
                require_once '../User/UserHeader.php';
            ?>
        </div>
        <div class="topnav">
            <?php require_once '../User/usernavbar.php';?>
            <label style="position: absolute; margin-top:1%; margin-left: 20%; color: #4dfc35;">Welcome <?php echo $_SESSION['uname'] ?></label>
        </div>
        
        <div class="middlecontent">
            <form action="revieworder.php" method="POST" enctype="multipart/form-data">
                    <div class="sellersel" id="sellersel" style="display: block;">
                <!--    <input list="lsvendor" name="lsvend" id="vendorsel">
                            <datalist id="lsvendor" >
                                <option selected value="">Select your preffered vendor</option>
                                <option value="one">one</option>
                                <option value="two">two</option>
                                <option value="three">three</option>
                            </datalist>-->
                        <select name="vendorsel" id="vendorsel" required>
                            <option value="" selected disabled>Select your preffered vendor</option>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
                                if(!$conn){
                                    die("Connection Failed");
                                }

                                $sql = "select * from vendor_tb";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $row['vendor_name']; ?>"><?php echo $row['vendor_name']; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <input type="file" name="file_name" accept="application/pdf" required id="fileupload" />
                    </div>
                    
                    <div class="collectdatadiv" id="collectdatadiv" style="display: none;">
                        <select name="typepaper" id="typepaper" required>
                                <option value="" selected disabled>Select Paper Size Type</option>
                                <option value="a4">A4</option>
                                <option value="a2">A2</option>
                                <option value="legal">Legal</option>
                            </select>
                        <br/>
                        <select name="colortype" id="colortype" required>
                                <option value="" selected disabled>Select Printing Color type</option>
                                <option value="blackwhite">Black and White</option>
                                <option value="colorprint">Coloured</option>
                        </select>
                        <input type="number" min="1" name="noofcopies" id="noofcopies" value="1" placeholder="How copies you want?">
                    </div>
                    
                    <div class="details" id="details" style="display: none;">
                        <label id="cnfrm" style="font-family: verdana; 
                               font-size: 2vw;
                               margin-left: 40%;">Confirm your Order</label>
                    </div>
                    
                    <div class="submitbtndiv">
                        <input id="submitbtn" type="button" value="Proceed" onclick="showdiv()">
                        <input id="submitbtn1" style="display: none;" type="button" value="Proceed" onclick="showbutton()">
                        <input id="btnformsubmit" type="submit" style="display: none;" value="Submit">
                        <input id="resetbtn" type="button" style="display:none;" value="Cancel" onclick="window.location.href='UserIndexPage.php';">
                        <script type="text/javascript">
                            function showdiv(){
                                var vendor = document.getElementById('vendorsel').value;
                                var fileupload = document.getElementById('fileupload').value;
                                if(vendor===null || vendor === "" || fileupload==="" || fileupload===null){
                                    alert('Please Fill Details ');
                                }else{
                                    var x = document.getElementById("sellersel");
                                    var y = document.getElementById("collectdatadiv");
                                    var z = document.getElementById("submitbtn");
                                    var w = document.getElementById("submitbtn1");
                                    if(x.style.display==="none"){

                                    }else{
                                        x.style.display="none";
                                        z.style.display="none";
                                        w.style.display="block";
                                        y.style.display="block";
                                    }
                                }
                            }
                            
                            function showbutton(){
                                
                                var papersize = document.getElementById('typepaper').value;
                                var colortype = document.getElementById('colortype').value;
                                var noofcopies = document.getElementById('noofcopies').value;
                                
                                if(papersize===null || colortype===null || noofcopies === null || papersize==="" ||
                                        colortype==="" || noofcopies==="" ){
                                    alert("Details Must be filled out.");
                                }else if(noofcopies<=0){
                                    document.getElementById('noofcopies').value = 1;
                                    alert("No of Copies should be Minimum 1")
                                }else{
                                    var x = document.getElementById("submitbtn1");
                                    var y = document.getElementById("btnformsubmit");
                                    var z = document.getElementById("details");
                                    var w = document.getElementById("collectdatadiv");
                                    var a = document.getElementById("resetbtn");
                                    if(x.style.display==="none"){

                                    }else{
                                        if(w.style.display==="block"){
                                            w.style.display="none";
                                            z.style.display="block";
                                        }
                                        x.style.display="none";
                                        y.style.display="block";
                                        a.style.display="block";
                                    }
                                }
                            }
                        </script>
                    </div>
            </form>
        </div>
    </body>
</html>
<?php
    }else{
        header("Location: http://localhost/DesignWebMini/index.php");
    }

