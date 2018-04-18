<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
        $filename = $_GET['file'];
        $err = 'Sorry, the file you are requesting is unavailable.';
        if (!$filename) {
        // if variable $filename is NULL or false display the message
            echo $err;
        } else {
        // define the path to your download folder plus assign the file name
            $path = 'C:/xampp/htdocs/DesignWebMini/uploads/'.$filename;
            // check that file exists and is readable
            if (file_exists($path) && is_readable($path)) {
            // get the file size and send the http headers
            $size = filesize($path);
            header('Content-Type: application/octet-stream');
            header('Content-Length: '.$size);
            header('Content-Disposition: attachment; filename='.$filename);
            header('Content-Transfer-Encoding: binary');
            // open the file in binary read-only mode
            // display the error messages if the file can´t be opened
            $file = @ fopen($path, 'rb');
            if ($file) {
            // stream the file and exit the script when complete
            fpassthru($file);
            exit;
            } else {
            echo $err;
            }
            } else {
            echo $err;
            }
        }
    } else {
    $filename = NULL;
    }
    ?>