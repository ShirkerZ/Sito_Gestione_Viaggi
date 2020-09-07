<?php

include 'registerDb.php';

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../CSS/Styles.css">
</head>
<body>
    <div class="header">
        <h2>SIGN UP</h2>
    </div>

    <form action="" method="post">
    <?php include('errors.php'); ?>
    <fieldset>
		<legend>Registrati</legend>
		<input type="text" name="username" placeholder="Username" class="classInput" autofocus required>
        <input type="text" name="password_1" placeholder="Password" class="classInput" autofocus required>
        <input type="text" name="password_2" placeholder="Conferma password" class="classInput" autofocus required>
	</fieldset>
	<p><input type="submit" name="invio" class="glow" placeholder="Invio">
        <input type="reset" name="reset" class="glow" placeholder="reset"></p>
        <p>Hai gia' un account? Effettua il <a href="login.php">Login</a></p>
    </form>
    
</body>
</html>

