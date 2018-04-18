<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
print_r($_FILES);
if($_FILES['file_name']['size']<(10*1024*1024)){
    session_start(); 
    if(isset($_SESSION['uname'])){
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
                <?php
                    if (isset($_POST['vendorsel']) && isset($_POST['typepaper']) && isset($_POST['colortype']) && isset($_POST['noofcopies'])){
                        $vendorname = $_POST['vendorsel'];
                        $papertype = $_POST['typepaper'];
                        $colortype = $_POST['colortype'];
                        $noofcopies = $_POST['noofcopies'];

                        $conn = mysqli_connect("localhost", "root", "", "phpminizerox");

                        if(!$conn){
                            die("Connection Failed ". mysqli_connect_error());
                        }

                        $sql = "select * from vendor_tb where vendor_name = '".$_POST['vendorsel']."'";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $vendor_id = $row['vendor_id'];
                            }
                            
                            echo $_SESSION['uid'];
                            if ($_FILES){
                                $target_dir = "C:/xampp/htdocs/DesignWebMini/uploads/";
                                $target_file = $target_dir.basename($_FILES["file_name"]["name"]);
                                $filename = basename($_FILES["file_name"]["name"]);
                                
                                $path_file = pathinfo($target_file);
                                $path_file_name=$path_file['filename'];
        
                                $path_file_ext = $path_file['extension'];
                                $filename=$path_file_name.$_SESSION['uid'].".".$path_file_ext;
                                
                                $target_file = $target_dir.$path_file_name.$_SESSION['uid'].".".$path_file_ext;
                                
                                $isvalidfile = FALSE;
                                $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                if(is_dir($target_dir)){
                                    if($filetype === "pdf"){
                                        $isvalidfile = TRUE;
                                    }
                                    if($isvalidfile){
                                        if(move_uploaded_file($_FILES["file_name"]["tmp_name"],$target_file)){
                                            echo $_FILES['file_name']['tmp_name'];
                                            echo "Uploaded Successfully";
                                            echo $_FILES["file_name"]["name"];

                                            $conn = mysqli_connect("localhost", "root", "", "phpminizerox");
                                            if (mysqli_error($conn)){
                                                die("Connection Failed : ". mysqli_connect_error($conn));
                                            }else{

                                               $ori_file_name = $filename;
                                               $location = $target_file;
                                               $sql = "insert into file_tb(user_id,vendor_id,orig_file_name,file_name,file_location,paper_size,color_type,no_copies,iscompleted) values('".$_SESSION['uid']."',$vendor_id,'".$ori_file_name."','".$filename."','".$location."','".$papertype."','".$colortype."','".$noofcopies."','pending')"; 
                                               $result = mysqli_query($conn, $sql);
                                               $rows = mysqli_affected_rows($conn);
                                               if ( $rows == 1 ){
                                                   echo "added in db";
                                                   echo "<script>alert('Successfully Ordered');</script>";
                                                    ?><script>
                                                        setTimeout("location.href = 'http://localhost/DesignWebMini/User/UserIndexPage.php';",0);
                                                    </script>
                                                        <?php
//                                                   header('Location: UserIndexPage.php');
//                                                   exit();
                                               }
                                            }
                                        } else {
                                           echo "<script>alert('File Upload Failed');</script>";
                                         ?>
                                        <script>
                                            setTimeout("location.href = 'http://localhost/DesignWebMini/User/UserIndexPage.php';",0);
                                        </script>
                                        <?php
                                        }
                                    } else {
                                        echo "<script>alert('Not valid File');</script>";
                                         ?>
                                        <script>
                                            setTimeout("location.href = 'http://localhost/DesignWebMini/User/UserIndexPage.php';",0);
                                        </script>
                                        <?php
//                                        header("Location: notvalidtypefile.html");
//                                        exit();
                                    }
                                }
                            } else {
                                echo "No File Uploaded";
                            }
                            
                        }else{

                        }
                    }
                ?>
            </body>
        </html>
        <?php
    }
}else{
    echo "<script> alert('File size is more than 10MB'); </script>";
    ?>
        <script>
            setTimeout("location.href = 'http://localhost/DesignWebMini/User/UserIndexPage.php';",0);
        </script>
    <?php
}
