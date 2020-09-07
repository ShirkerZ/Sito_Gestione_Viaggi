<?php

setcookie('login', $_POST['username'], 0, '', '', false, false);

/*REGISTRAZIONE*/

require '../Libreria/Database.php';

$conn = getDatabase();

$username = '';
$password = '';
$errors = array();

if (isset($_POST['invio'])) {
	// ricevimento degli input
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  
	// controlla la correttezza dei dati
	if (empty($username)) { array_push($errors, "<div id='error'>Inserire l'username...</div>"); }
	if (empty($password_1)) { array_push($errors, "<div id='error'>Inserire la password...</div>"); }
	if ($password_1 != $password_2) {
	  array_push($errors, "<div id='error'>Le due password non sono uguali...</div>");
	}

	// Controlla se l'utente ha gia' un account
	$user_check_query = "SELECT * FROM registro WHERE username='$username' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	// Se l'utente ha già un account...
	if ($user) { 
		if ($user['username'] === $username) {
		  array_push($errors, "<div id='error'>Questo account esiste gia'...</div>");
		}
	}

	// Controlla se ci sono stati degli errori
	if (count($errors) == 0) {
		$password = md5($password_1);//criptazione della password

		$query = "INSERT INTO registro (username, password) 
				VALUES('$username','$password')";
		mysqli_query($conn, $query);
		$_COOKIE['username'] = $username;
		echo ("<div id='success'>Registrazione avvenuta con successo...</div>");
		
		header('location: ../index.php');// Sposta l'utente su index.php
    }
}

/*LOGIN*/

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
	



