<?php
 session_start();

  $username = "admin";
  $password = "admin123";

  if(isset($_SESSION['loggedwin']) && $_SESSION['loggedwin'] == true){
      header("Location:success1.html");
  }
if (isset($_POST['username']) && isset($_POST['password'])) {
 if($_POST['username'] == $username && $_POST['password'] == $password){
     $_SESSION['loggedwin'] = true;
      header("Location:success1.html");
  
 }
 
}

?>