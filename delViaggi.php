<?php
	
	require 'Libreria/database.php';
	include 'Vista/template.php';
	include 'Vista/templateViaggi.php';
	include 'Libreria/Effects.js';

?>

<br>
<br>
	<form method="post" action=""> 
		<fieldset>
			<legend>Elimina viaggio</legend>

					<label for ="idViaggio">ID Viaggio: </label>
					<select name="idViaggio" class="classInput select" required><?php echo viaggi() ?></select>
		</fieldset>

		<p><input type="submit" name="invio" class="glow viaggi" placeholder="Invio">
	<input type="reset" name="reset" class="glow viaggi" placeholder="reset"></p>
	</form>

<?php
	if(isset($_POST['invio'])){

		$idViaggio = $_POST['idViaggio'];

		$_POST['idViaggio'] = filter_var($idViaggio, FILTER_VALIDATE_INT);

		if(!filter_var($idViaggio, FILTER_VALIDATE_INT) === false){
			delViaggi($_POST['idViaggio']);
		}else{
			echo $msg = "<div id='error'>$idViaggio is not a valid ID</div>";
		}

		
	}

	?>

	<div id="slide"><?php echo getArchivioViaggi() ?></div>
	
	<?php

	include 'Vista/footerViaggi.php';
?>
