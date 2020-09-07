<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateViaggi.php';
include 'Libreria/Effects.js';

?>
<br>
<br>

<form method="post" action="">
	<fieldset>
		<legend>Inserisci viaggio</legend>
		<input type="text" name="destinazione" class="classInput" placeholder="destinazione" autofocus required>
		<input type="number" name="postiDisp" class="classInput" placeholder="posti disponibili" required>

		<label for="dataP">Data partenza: </label>
		<input type="date" name="dataP" class="classInput" required>

		<label for="dataR">Data ritorno: </label>
		<input type="date" name="dataR" class="classInput" required>

		<label for="sePassaporto">sePassaporto: </label>
		<input type="radio" name="sePassaporto" value="1" class="classInput radio">Si
		<input type="radio" name="sePassaporto" value="0" class="classInput radio">No

		<input type="text" name="luogoP" class="classInput" placeholder="luogo partenza" required>

		<label for="codCliente">Codice mezzo: </label>
		<select name="codMezzo" class="classInput select" required><?php echo mezzi() ?></select>

		<input type="float" name="prezzo" class="classInput" placeholder="prezzo" required>
	</fieldset>
	<p><input type="submit" class="glow viaggi" name="invio">
		<input type="reset" class="glow viaggi" name="reset"></p>
</form>

<?php

if (isset($_POST['invio'])) {
	$dataP = $_POST['dataP'];
	$dataR = $_POST['dataR'];

	$postiDisp = $_POST['postiDisp'];
	$sePassaporto = $_POST['sePassaporto'];

	$_POST['postiDisp'] = filter_var($postiDisp, FILTER_VALIDATE_INT);
	$_POST['sePassaporto'] = filter_var($sePassaporto, FILTER_VALIDATE_BOOLEAN);

	if($_POST['dataP'] > $_POST['dataR']){
		trigger_error("<br>Error", E_USER_WARNING );
	}else{
		if (!filter_var($postiDisp, FILTER_VALIDATE_INT) === false) {
			if (!filter_var($sePassaporto, FILTER_VALIDATE_BOOLEAN) === false) {
				setViaggi($_POST['destinazione'], $_POST['postiDisp'], $_POST['dataP'], $_POST['dataR'], $_POST['sePassaporto'], $_POST['luogoP'], $_POST['codMezzo'], $_POST['prezzo']);
			} else {
				echo $msg = "<div id='error'>$sePassaporto is not a valid Boolean</div>";
			}
		} else {
			echo $msg = "<div id='error'>$postiDisp is not a valid number</div>";
		}
	}
}

?>

<div id="slide"><?php echo getArchivioViaggi() ?></div>

<?php

include 'Vista/footerViaggi.php';
?>