<?php
 session_start();

  $username = "student";
  $password = "stud123";

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
      header("Location:project/index.html");
  }
if (isset($_POST['username']) && isset($_POST['password'])) {
 if($_POST['username'] == $username && $_POST['password'] == $password){
     $_SESSION['logged_in'] = true;
      header("Location:project/index.html");
  
 }
}

?>