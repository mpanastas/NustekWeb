<?php
   session_start();
   $user_check = $_SESSION['login_user'];   
   if(!isset($_SESSION['login_user_mail'])){
      header("location:login.php");
   }
?>