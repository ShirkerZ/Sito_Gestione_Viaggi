<?php

include 'registerDb.php';

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" type="text/css" href="../CSS/Styles.css">
</head>
<body>
    <div class="header">
        <h2>LOGIN</h2>
    </div>

    <form action="" method="post">
    <?php include('errors.php'); ?>
    <fieldset>
		<legend>Accedi</legend>
		<input type="text" name="username" placeholder="Username" class="classInput" autofocus required>
        <input type="text" name="password" placeholder="Password" class="classInput" autofocus required>
	</fieldset>
	<p><input type="submit" name="invio" class="glow" placeholder="Invio">
        <input type="reset" name="reset" class="glow" placeholder="reset"></p>
        <p>Non hai un account? <a href="sign_up.php">Registrati</a></p>
    </form>
    
</body>
</html>