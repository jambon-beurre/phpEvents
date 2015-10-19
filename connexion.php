<?php

include ("Begin.php");

echo 	'<form action ="index.php" method="post">
			<p>Adresse mail : <input type="text" name="email"/></p>
			<p>Mot de passe : <input type="password" name="pwd"/></p>
			<button type="submit" value="Calculer">Connexion</button>
		</form>';

include ("End.php");

?>