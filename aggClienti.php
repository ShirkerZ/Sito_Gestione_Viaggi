<?php
require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateClienti.php';
include 'Libreria/Effects.js';

?>
<br>
<br>

<form method='post' action="">
	<fieldset>
		<legend>Aggiorna cliente</legend>
		<input type="text" name="cognome" placeholder="Cognome" class="classInput" autofocus required>
		<input type="text" name="nome" class="classInput" placeholder="Nome" required>
		<input type="text" name="codFiscale" class="classInput" placeholder="codice fiscale" required>
		<label for="dataNascita">Data nascita: </label>
		<input type="date" name="dataNascita" class="classInput" placeholder="data nascita" required>
		<input type="text" name="telefono" class="classInput" placeholder="telefono" required>
		<input type="text" name="email" class="classInput" placeholder="email" required>
		<input type="text" name="indirizzo" class="classInput" placeholder="indirizzo" required>
		<label for="codCliente">Codice del cliente: </label>
		<select name="codCliente" class="classInput select" required><?php echo clienti() ?></select>
	</fieldset>
	<p><input type="submit" name="invio" class="glow clienti" class="btn clienti" placeholder="Invio">
	<input type="reset" name="reset" class="glow clienti" class="btn clienti" placeholder="reset"></p>
</form>
<?php



if (isset($_POST['invio'])) {
	$email = $_POST['email'];
	$_POST['email'] = filter_var($email, FILTER_VALIDATE_EMAIL);
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		aggClienti($_POST['cognome'], $_POST['nome'], $_POST['codFiscale'], $_POST['dataNascita'], $_POST['telefono'], $_POST['email'], $_POST['indirizzo'], $_POST['codCliente']);
	}else{
		echo $msg = "<div id='error'>$email is not a valid email address</div>";
	}	
}

?>

<div id="slide"><?php echo getArchivioClienti() ?></div>

<?php

include 'Vista/footerClienti.php';
?>