<?php

/*CONNESSIONE*/
function getDatabase()
{
	$server = 'localhost';
	$user = 'root';
	$pwd = '';
	$db = 'viaggi';
	$conn = mysqli_connect($server, $user, $pwd, $db) or die("Connessione fallita");
	return $conn;
}
/*CLIENTI*/
function setClienti($cognome, $nome, $codFiscale, $dataNascita, $telefono, $email, $indirizzo)
{
	$query = "INSERT INTO clienti(cognome, nome, codFiscale, dataNascita, telefono, email, indirizzo) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$conn = getDatabase();

	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "sssssss", $cognome, $nome, $codFiscale, $dataNascita, $telefono, $email, $indirizzo);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function delClienti($codCliente)
{
	$query = "DELETE FROM clienti WHERE codCliente = ?;";
	$conn = getDatabase();

	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $codCliente);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function aggClienti($cognome, $nome, $codFiscale, $dataNascita, $telefono, $email, $indirizzo, $codCliente)
{
	$query = "UPDATE clienti SET cognome = ?, nome = ?, codFiscale = ?, dataNascita = ?, telefono = ?, email = ?, indirizzo = ? WHERE codCliente = ?;";
	$conn = getDatabase();

	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "sssssssi", $cognome, $nome, $codFiscale, $dataNascita, $telefono, $email, $indirizzo, $codCliente);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function creaTabellaClienti($elenco)
{
	$contenuto = '<br><a href="vistaClienti.php" class="nameTab a">Tabella clienti</a><div class="show"><table class ="tab a"><tr><th>cod Cliente<th>cognome</th><th>Nome</th><th>cod Fiscale</th><th>Data Nascita</th><th>telefono</th><th>email</th><th>indirizzo</th></tr>';
	foreach ($elenco as $cont) {
		$contenuto .= "
			<tr><td>{$cont['codCliente']}</td>
			<td>{$cont['cognome']}</td>
			<td>{$cont['nome']}</td>
			<td>{$cont['codFiscale']}</td>
			<td>{$cont['dataNascita']}</td>
			<td>{$cont['telefono']}</td>
			<td>{$cont['email']}</td>
			<td>{$cont['indirizzo']}</td></tr>";
	}
	$contenuto .= '</table></div>';

	return $contenuto;
}
function getArchivioClienti()
{
	$elenco = [];
	$query = 'SELECT * FROM clienti;';
	$conn = getDatabase();
	$tuttiClienti = mysqli_query($conn, $query);
	while ($cliente = mysqli_fetch_assoc($tuttiClienti)) {
		$elenco[] = $cliente;
	}
	$contenuto = creaTabellaClienti($elenco);
	mysqli_close($conn);
	return $contenuto;
}

function clienti()
{
	$elenco = [];
	$query = "SELECT codCliente FROM clienti ;";
	$conn = getDatabase();
	$tuttiClienti = mysqli_query($conn, $query) or die(mysqli_error($conn));
	while ($cliente = mysqli_fetch_assoc($tuttiClienti)) {
		$elenco[] = $cliente;
	}
	$contenuto = "";
	foreach ($elenco as $elem) {
		$contenuto .= "<option>{$elem['codCliente']}</option>";
	}
	mysqli_close($conn);
	return $contenuto;
}


/*VIAGGI*/

function setViaggi($destinazione, $postiDisp, $dataP, $dataR, $sePassaporto, $luogoP, $codMezzo, $prezzo)
{
	$query = "INSERT INTO viaggi(destinazione,postDisp,dataP,dataR,sePassaporto,luogoP,codMezzo,prezzo) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
	$conn = getDatabase();

	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "sissssid", $destinazione, $postiDisp, $dataP, $dataR, $sePassaporto, $luogoP, $codMezzo, $prezzo);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function delViaggi($idViaggio)
{
	$query = "DELETE FROM viaggi WHERE idViaggio = ?;";
	$conn = getDatabase();
	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $idViaggio);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function aggViaggi($destinazione, $postiDisp, $dataP, $dataR, $sePassaporto, $luogoP, $codMezzo, $prezzo, $idViaggio)
{
	$query = "UPDATE viaggi SET destinazione = ?, postDisp = ?, dataP = ?, dataR = ?, sePassaporto = ?, luogoP = ?, codMezzo = ?, prezzo = ? WHERE idViaggio = ?;";
	$conn = getDatabase();
	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "sissssidi", $destinazione, $postiDisp, $dataP, $dataR, $sePassaporto, $luogoP, $codMezzo, $prezzo ,$idViaggio);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function creaTabellaViaggi($elenco)
{
	$contenuto = '<br><a href="vistaViaggi.php" class="nameTab b">Tabella viaggi</a><div class="show"><table class ="tab b" ><tr><th>id Viaggio<th>destinazione</th><th>posti Disp.</th><th>data Part.</th><th>data Rit.</th><th>se Pasaporto</th><th>luogo P</th><th>cod Mezzo</th><th>Desc. mezzo</th><th>Prezzo</th></tr>';
	foreach ($elenco as $cont) {
		if($cont['sePassaporto'] == 1){
			$pass = "Si";
		}else{
			$pass = "No";
		}
		$contenuto .= "
			<tr><td>{$cont['idViaggio']}</td>
			<td>{$cont['destinazione']}</td>
			<td>{$cont['postDisp']}</td>
			<td>{$cont['dataP']}</td>
			<td>{$cont['dataR']}</td>
			<td>{$pass}</td>
			<td>{$cont['luogoP']}</td>
			<td>{$cont['codMezzo']}</td>
			<td>{$cont['descrizione']}</td>
			<td>{$cont['prezzo']}</td></tr>";
	}

	$contenuto .= '</table></div>';	

	return $contenuto;
}
function getArchivioViaggi()
{
	$elenco = [];
	$query = 'SELECT * FROM viaggi inner join mezzi ON mezzi.codMezzo = viaggi.codMezzo;';
	//$query2 = 'SELECT descrizione FROM mezzi WHERE codMezzo IN (SELECT codMezzo FROM viaggi);';

	$conn = getDatabase();
	//$mezzi = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	$tuttiViaggi = mysqli_query($conn, $query) or die(mysqli_error($conn));
	while ($viaggio = mysqli_fetch_assoc($tuttiViaggi)) {
		$elenco[] = $viaggio;		
	}	
	/*while ($mezzo = mysqli_fetch_assoc($mezzi)) {
		$elenco2[] = $mezzo;
	}*/
	$contenuto = creaTabellaViaggi($elenco);
	mysqli_close($conn);
	return $contenuto;
}

function viaggi()
{
	$elenco = [];
	$query = "SELECT idViaggio FROM viaggi ;";
	$conn = getDatabase();
	$tuttiViaggi = mysqli_query($conn, $query) or die(mysqli_error($conn));
	while ($viaggio = mysqli_fetch_assoc($tuttiViaggi)) {
		$elenco[] = $viaggio;
	}
	$contenuto = "";
	foreach ($elenco as $elem) {
		$contenuto .= "<option>{$elem['idViaggio']}</option>";
	}
	mysqli_close($conn);
	return $contenuto;
}

/*MEZZI*/
function setMezzi($descrizione)
{
	$query = "INSERT INTO  mezzi(descrizione) VALUES(?);";
	$conn = getDatabase();
	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "s", $descrizione);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function delMezzi($codMezzo)
{
	$query = "DELETE FROM mezzi WHERE codMezzo = ?;";
	$conn = getDatabase();
	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $codMezzo);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function aggMezzi($descrizione, $codMezzo)
{
	$query = "UPDATE mezzi SET descrizione = '$descrizione' WHERE codMezzo = ?;";
	$conn = getDatabase();
	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "si", $descrizione, $codMezzo);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function creaTabellaMezzi($elenco)
{
	$contenuto = '<br><a href="vistaMezzi.php" class="nameTab c">Tabella mezzi</a><div class="show2"><table class ="tab c"><tr><th>cod Mezzo<th>descrizione</th></tr>';
	foreach ($elenco as $cont) {
		$contenuto .= "
			<tr><td>{$cont['codMezzo']}</td>
			<td>{$cont['descrizione']}</td></tr>";
	}
	$contenuto .= '</table></div>';

	return $contenuto;
}

function getArchivioMezzi()
{
	$elenco = [];
	$query = 'SELECT * FROM mezzi;';
	$conn = getDatabase();
	$tuttiMezzi = mysqli_query($conn, $query);
	while ($mezzo = mysqli_fetch_assoc($tuttiMezzi)) {
		$elenco[] = $mezzo;
	}
	$contenuto = creaTabellaMezzi($elenco);
	mysqli_close($conn);
	return $contenuto;
}

function mezzi()
{
	$elenco = [];
	$query = "SELECT codMezzo FROM mezzi ;";
	$conn = getDatabase();
	$tuttiMezzi = mysqli_query($conn, $query) or die(mysqli_error($conn));
	while ($mezzo = mysqli_fetch_assoc($tuttiMezzi)) {
		$elenco[] = $mezzo;
	}
	$contenuto = "";
	foreach ($elenco as $elem) {
		$contenuto .= "<option>{$elem['codMezzo']}</option>";
	}
	mysqli_close($conn);
	return $contenuto;
}

/*PRENOTAZIONI*/
function setPrenotazioni($codCliente, $idViaggio)
{
	$query = "INSERT INTO prenotazioni(codCliente,idViaggio) VALUES(?, ?);";
	$conn = getDatabase();
	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "ii", $codCliente, $idViaggio);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function delPrenotazioni($idP)
{
	$query = "DELETE FROM prenotazioni WHERE idP = ?;";
	$conn = getDatabase();

	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $idP);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function aggPrenotazioni($codCliente, $idViaggio, $idP)
{
	$query = "UPDATE prenotazioni SET codCliente = ?, idViaggio = ? WHERE idP = ?;";
	$conn = getDatabase();

	if ($stmt = mysqli_prepare($conn, $query)) {
		mysqli_stmt_bind_param($stmt, "iii", $codCliente, $idViaggio, $idP);
		if (mysqli_stmt_execute($stmt)) {
			echo "<div id='success'>Input inserito correttamente </div>";
		} else {
			echo "<div id='error'>ERROR: Could not execute query: $query. </div> " . mysqli_error($conn);
		}
	} else {
		echo "<div id='error'>ERROR: Could not prepare query: $query. </div> " . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

function creaTabellaPrenotazioni($elenco)
{
	$contenuto = '<br><a href="vistaPrenotazioni.php" class="nameTab d">Tabella prenotazioni</a><div class="show3"><table class ="tab d"><tr><th>id Prenotazione<th>cod Cliente</th><th>Cliente</th><th>id Viaggio</th><th>destinazione</th></tr>';
	foreach ($elenco as $cont) {
		$contenuto .= "
			<tr><td>{$cont['idP']}</td>
			<td>{$cont['codCliente']}</td>
			<td>{$cont['cognome']}</td>
			<td>{$cont['idViaggio']}</td>
			<td>{$cont['destinazione']}</td></tr>";
	}
	$contenuto .= '</table></div>';

	return $contenuto;
}

function getArchivioPrenotazioni()
{
	$elenco = [];
	$query = 'SELECT * FROM prenotazioni inner join viaggi ON prenotazioni.idViaggio = viaggi.idViaggio inner join clienti ON prenotazioni.codCliente = clienti.codCliente ;';
	$conn = getDatabase();
	$tuttePrenotazioni = mysqli_query($conn, $query) or die(mysqli_error($conn));
	while ($prenotazione = mysqli_fetch_assoc($tuttePrenotazioni)) {
		$elenco[] = $prenotazione;
	}
	$contenuto = creaTabellaPrenotazioni($elenco);
	mysqli_close($conn);
	return $contenuto;
}

function prenotazioni()
{
	$elenco = [];
	$query = "SELECT idP FROM prenotazioni ;";
	$conn = getDatabase();
	$tuttePrenotazioni = mysqli_query($conn, $query) or die(mysqli_error($conn));
	while ($prenotazione = mysqli_fetch_assoc($tuttePrenotazioni)) {
		$elenco[] = $prenotazione;
	}
	$contenuto = "";
	foreach ($elenco as $elem) {
		$contenuto .= "<option>{$elem['idP']}</option>";
	}
	mysqli_close($conn);
	return $contenuto;
}


/*ERRORI*/

function customError($errno, $errstr){
	echo "<div id='error'><b>Error: </b>[$errno] $errstr<br>";
	echo "Please coose a correct date... </div>";
	//error_log("Error: [$errno] $errstr", 1, "someone@example.com", "From: zubenko21087@iistorriani.it");

}


