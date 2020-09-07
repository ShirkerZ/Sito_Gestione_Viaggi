<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateClienti.php';
include 'Libreria/Effects.js';

?>
<br>
<br>

<form method="post" action="">
	<fieldset>
		<legend>Inserisci cliente</legend>
		<input type="text" name="cognome" placeholder="Cognome" class="classInput" autofocus required>
		<input type="text" name="nome" class="classInput" placeholder="Nome" required>
		<input type="text" name="codFiscale" class="classInput" placeholder="codice Fiscale" required>
		<input type="date" name="dataNascita" class="classInput" placeholder="data Nascita" required>
		<input type="text" name="telefono" class="classInput" placeholder="telefono" required>
		<input type="text" name="email" class="classInput" placeholder="email" required>
		<input type="text" name="indirizzo" class="classInput" placeholder="indirizzo" required>
	</fieldset>
	<p><input type="submit" name="invio" class="glow clienti" placeholder="Invio">
		<input type="reset" name="reset" class="glow clienti" placeholder="reset"></p>
</form>
<br>

<p id="demo"></p>

<?php

if (isset($_POST['invio'])) {
	
	$email = $_POST['email'];

	$_POST['email'] = filter_var($email, FILTER_VALIDATE_EMAIL);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		setClienti($_POST['cognome'], $_POST['nome'], $_POST['codFiscale'], $_POST['dataNascita'], $_POST['telefono'], $_POST['email'], $_POST['indirizzo']);
	} else {
		echo $msg = "<div id='error'>$email is not a valid email address</div>";
	}
}

?>

<div id="slide"><?php echo getArchivioClienti() ?></div>

<?php

include 'Vista/footerClienti.php';
?>