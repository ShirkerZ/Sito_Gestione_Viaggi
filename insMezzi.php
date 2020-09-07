<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateMezzi.php';
include 'Libreria/Effects.js';

?>

<head>
    <title>Inserisci mezzo</title>
</head>
<br>
<br>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>Inserisci mezzo</legend>


                    <input type="text" name="descrizione" class="classInput" placeholder="descrizione" required>

        </fieldset>
        <p><input type="submit" class="glow  mezzi"name="invio">
                <input type="reset" class="glow  mezzi" name="reset"></p>
    </form>

    

</body>

</html>

<?php

if (isset($_POST['invio'])) {
    
    setMezzi($_POST['descrizione']);
}
?>

<div id="slide"><?php echo getArchivioMezzi() ?></div>

<?php
include 'Vista/footerMezzi.php';
?>