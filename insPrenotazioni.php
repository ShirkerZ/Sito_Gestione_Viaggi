<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templatePrenotazioni.php';
include 'Libreria/Effects.js';

?>


<head>
	<title>Inserisci presentazione</title>
</head>
<br>
<br>

<body>

	<form method="post" action="">
		<fieldset>
			<legend>Inserisci presentazione</legend>
			<label for="codCliente">Codice cliente: </label>
			<select name="codCliente" class="classInput select" required><?php echo clienti() ?></select>
			<label for="idViaggio">ID Viaggio: </label>
			<select name="idViaggio" class="classInput select" required><?php echo viaggi() ?></select>

		</fieldset>
		<p><input type="submit" class="glow prenotazioni" name="invio">
			<input type="reset" class="glow prenotazioni" name="reset"></p>
	</form>

</body>

</html>

<?php

if (isset($_POST['invio'])) {

	$codCliente = $_POST['codCliente'];
	$idViaggio = $_POST['idViaggio'];

	$_POST['codCliente'] = filter_var($codCliente, FILTER_VALIDATE_INT);
	$_POST['idViaggio'] = filter_var($idViaggio, FILTER_VALIDATE_INT);
	
	if (!filter_var($codCliente, FILTER_VALIDATE_INT) === false) {
		if (!filter_var($idViaggio, FILTER_VALIDATE_INT) === false) {
			setPrenotazioni($_POST['codCliente'], $_POST['idViaggio']);
		} else {
			echo $msg = "<div id='error'>$idViaggio is not a valid number</div>";
		}
	} else {
		echo $msg = "<div id='error'>$codCliente is not a valid number</div>";
	}
}

?>

<div id="slide"><?php echo getArchivioPrenotazioni() ?></div>

<?php

include 'Vista/footerPrenotazioni.php';
?>