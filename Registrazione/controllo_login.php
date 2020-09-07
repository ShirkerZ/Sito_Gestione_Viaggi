<?php 
setcookie('login', $_POST['username'], 0, '', '', false, false);

  if (!isset($_COOKIE['username'])) {
  	$_COOKIE['msg'] = "You must log in first";
  	header('location: login.php');
  }

  if(isset($_COOKIE['username'])){
    header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	SESSION_destroy();
  	unset($_COOKIE['username']);
  	header("location: login.php");
  }

?>