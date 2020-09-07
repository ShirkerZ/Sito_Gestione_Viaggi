<head>
<?php

require 'Libreria/Database.php';

include 'Vista/template.php';

include 'Libreria/Effects.js';

?>

</head>   
<br>

<div class="content">

  	<!-- messaggio di notifica -->
  	<?php if (isset($_COOKIE['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_COOKIE['success']; 
          	unset($_COOKIE['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

</div>

<form method="post" action="#" >
    <fieldset class="fieldset home">
        <legend>HOME</legend>
        <p>Usa la barra di navigazione per spostarti da una pagina all'altra</p>
    </fieldset>
    <br>
    <br>
    <input type="button" name="invio" value="Boing" class="glow home">
</form>
<br>

<?php

include 'Vista/footer.php';
?>