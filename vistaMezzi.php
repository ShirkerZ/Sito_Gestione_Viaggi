<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateMezzi.php';
include 'Libreria/Effects.js';

?>

<div id="slide"><?php echo getArchivioMezzi() ?></div>

<?php

include 'Vista/footerMezzi.php';

?>