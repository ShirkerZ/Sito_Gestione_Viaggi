<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateClienti.php';
include 'Libreria/Effects.js';

?>

<div id="slide"><?php echo getArchivioClienti() ?></div>

<?php
include 'Vista/footerClienti.php';

?>