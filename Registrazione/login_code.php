<?php

/*LOGIN*/

require '../Libreria/Database.php';

$conn = getDatabase();

$username = '';
$password = '';
$errors = array();

// ricevimento degli input
if(isset($_POST_['invio'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

    // controlla la corretteza dei dati
    if(empty($username)){
        array_push($errors, "<div id='error'>Inserire l'username...</div>"); 
    }
    if(empty($password)){
        array_push($errors, "<div id='error'>Inserire la password...</div>");
    }
}

if (count($errors) == 0) {
	$password = md5($password);
	$query = "SELECT * FROM registro WHERE username='$username' AND password='$password'";
	$results = mysqli_query($conn, $query);
	if (mysqli_num_rows($results) == 1) {
	  $_SESSION['username'] = $username;
	  $_SESSION['success'] = "<div id='success'>Hai effettuato il login!</div>";
	  header('location: ../index.php');
	}else {
		array_push($errors, "<div id='error'>Credenziali errate...</div>");
	}
}