<?php
 session_start();

  $username = "admin";
  $password = "admin";

  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
      header("Location:success1.html");
  }
if (isset($_POST['username']) && isset($_POST['password'])) {
 if($_POST['username'] == $username && $_POST['password'] == $password){
     $_SESSION['logged_in'] = true;
     header("Location:success1.html");
 }
}
 
?>