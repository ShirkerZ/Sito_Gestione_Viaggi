<?php

require 'Libreria/database.php';
include 'Vista/template.php';
include 'Vista/templateClienti.php';
include 'Libreria/Effects.js';

?>

<br>
<br>
<form method="post" action="">
	<fieldset>
		<legend>Elimina cliente</legend>
		<label for="codCliente">Codice cliente: </label>
		<select name="codCliente" class="classInput select" required><?php echo clienti() ?></select>
	</fieldset>
	<p><input type="submit" name="invio" class="glow clienti" class="btn clienti" placeholder="Invio">
	<input type="reset" name="reset" class="glow clienti" class="btn clienti" placeholder="reset"></p>
</form>


<?php
if (isset($_POST['invio'])) {

	$codCliente = $_POST['codCliente'];
	
	$_POST['codCliente'] = filter_var($codCliente, FILTER_VALIDATE_INT);

	if (!filter_var($codCliente, FILTER_VALIDATE_INT) === false) {
		delClienti($_POST['codCliente']);
	} else {
		echo $msg = "<div id='error'>$codCliente is not a valid ID</div>";
	}
}

?>

<div id="slide"><?php echo getArchivioClienti() ?></div>

<?php

include 'Vista/footerClienti.php';
?>