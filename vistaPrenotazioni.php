<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templatePrenotazioni.php';
include 'Libreria/Effects.js';

?>

<div id="slide"><?php echo getArchivioPrenotazioni() ?></div>

<?php

include 'Vista/footerPrenotazioni.php';

?>