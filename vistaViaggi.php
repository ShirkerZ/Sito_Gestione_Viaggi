<?php

require 'Libreria/Database.php';
include 'Vista/template.php';
include 'Vista/templateViaggi.php';
include 'Libreria/Effects.js';

?>

<div id="slide"><?php echo getArchivioViaggi() ?></div>

<?php

include 'Vista/footerViaggi.php';

?>