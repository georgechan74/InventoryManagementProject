<?php  
ob_start();
require 'header.php';

//if not logged in go to login page
 if ((!isset($_SESSION["username"])))
 {
    header("Location: login.php");
 } 

 else
 {  
      $printToPage = '<h3 style="text-align: center;">Welcome, '.$_SESSION["employee_id"].' - ';

      // foreach ($_SESSION['userRoles'] as $value) {
      //   $printToPage .= $value . " ";
      // }

      foreach ($_SESSION['userRoles'] as $value) {
        $printToPage .= $value . " ";
      }

      if (in_array("ADMIN", $pieces)) {
        $printToPage .= "true";
      }

      

      $printToPage .= '.</h3>';

      echo $printToPage; 
      
          //if admin
          // if ($_SESSION["role"] == 'admin')
          // {
          //   // echo 'admin - all'; 
          //   echo '
          //  <!DOCTYPE html>
          //  <html>
          //  <head>
          //  <meta charset="UTF-8">
          //  <meta name="google" content="notranslate"> 
          //  <meta http-equiv="Content-Language" content="en">
          //  </head>
          //  <body>
          //  <br>
          //  </body>
          //  </html> ';
          // }

      //if user
      // else if ($_SESSION["role"] == 'user')
      // {
      //   // echo 'user - all but add new user'; 
      //   echo '<!DOCTYPE html>
      //      <html>
      //      <head>
      //      <meta charset="UTF-8">
      //      <meta name="google" content="notranslate"> 
      //      <meta http-equiv="Content-Language" content="en">
      //      </head>
      //      <body>
      //      <br>
      //      </body>
      //      </html> ';
      // }

      // //if manager
      // else if ($_SESSION["role"] == 'manager')
      // {
      //   echo 'test';
      //   // echo 'manager - view only';
      // }
 } 
//  require 'Footer.html'; 
 ?>  