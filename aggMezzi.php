<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateMezzi.php';
include 'Libreria/Effects.js';

?>

<head>
    <title>Aggiorna mezzo</title>
</head>

<br>
<br>

<body>
    <form method="post" action="">
        <fieldset>
            <legend>Aggiorna mezzo</legend>

            <input type="text" name="descrizione" class="classInput" placeholder="descrizione" required>
                    <label for="codMezzo">Codice mezzo: </label> 
                    <select name="codMezzo" class="classInput select" required><?php echo mezzi() ?></select>
        </fieldset>
        <p><input type="submit" class="glow mezzi" class="btn clienti" name="invio">
                <input type="reset" class="glow mezzi" class="btn clienti" name="reset"></p>
    </form>

</body>

</html>

<?php

if (isset($_POST['invio'])) {

    $descrizione = $_POST['codMezzo'];

    $_POST['codMezzo'] = filter_var($codMezzo, FILTER_VALIDATE_INT);

    if(!filter_var($descrizione, FILTER_VALIDATE_INT) === false){
        aggMezzi($_POST['descrizione'], $_POST['codMezzo']);
    }else{
        echo $msg = "<div id='error'>$codMezzo is not a valid ID</div>";
    }    
}

?>

<div id="slide"><?php echo getArchivioMezzi() ?></div>

<?php

include 'Vista/footerMezzi.php';
?>