<?php
	require 'Database.php';
	$conn = getDatabase();
	mysqli_query($conn, 'CREATE DATABASE viaggi') or die(mysqli_error($conn));
	mysqli_close($conn);
	$query = "
		CREATE TABLE clienti(
			codCliente int auto_increment not null primary key,
			cognome varchar(15),
			nome varchar(15),
			codFiscale varchar(16),
			dataNascita date,
			telefono varchar(15),
			email varchar(25),
			indirizzo varchar(40)
		);";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	$query = "
		CREATE TABLE mezzi(
			codMezzo int auto_increment not null key,
			descrizione varchar(30)
		);";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	$query = "	
		CREATE TABLE viaggi(
			idViaggio int auto_increment not null primary key,
			destinazione varchar(25),
			postDisp int,
			dataP date,
			dataR date,
			sePassaporto tinyint(1),
			luogoP varchar(20),
			codMezzo int not null,
			prezzo float,
			FOREIGN KEY(codMezzo) REFERENCES mezzi(codMezzi) 
		);";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	$query = "	
		CREATE TABLE prenotazioni(
			idP int auto_increment not null primary key,
				codCliente int not null,
				idViaggio int not null,
			FOREIGN KEY(codCliente) REFERENCES clienti(codCliente) ON UPDATE RESTRICT ON DELETE RESTRICT,
			FOREIGN KEY(idViaggio) REFERENCES viaggi(idViaggio) ON UPDATE RESTRICT ON DELETE RESTRICT

		);";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	mysqli_close($conn);
	header('location:index.php');
?>