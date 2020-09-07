<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templatePrenotazioni.php';
include 'Libreria/Effects.js';

?>

<head>
    <title>Eimina Prenotazione</title>
</head>
<br>
<br>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>Elimina Prenotazione</legend>
                    <label for="idP">ID Prenotazione: </label> 
                    <select name="idP" class="classInput select" required><?php echo prenotazioni() ?></select>
        </fieldset>
        <p><input type="submit" class="glow prenotazioni" name="invio">
                <input type="reset" class="glow prenotazioni" name="reset"></p>
    </form>

</body>

</html>

<?php

if (isset($_POST['invio'])) {


	$idP = $_POST['idP'];


	$_POST['idP'] = filter_var($idP, FILTER_VALIDATE_INT);

	if (!filter_var($idP, FILTER_VALIDATE_INT) === false) {

				delPrenotazioni( $_POST['idP']);
	} else {
		echo $msg = "<div id='error'>$idP is not a valid ID</div>";
	}
}

?>

<div id="slide"><?php echo getArchivioPrenotazioni() ?></div>

<?php

include 'Vista/footerPrenotazioni.php';
?>