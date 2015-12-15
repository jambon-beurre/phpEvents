<?php

	include ("Begin.php");

	if(isConnected()){
			echo 'Vous êtes connecté en tant que : '. $_COOKIE['email'] . '<br/>';
			?>

			<p>Changer de mot de passe</p>
			<form action="change_mdp.php" method="post">
				<p>Nouveau mot de passe : <input type = "password" name = "pwd1"></p>
				<p>Confirmer mot de passe : <input type = "password" name = "pwd2"></p>
				<button type="submit">Valider</button>
			</form>

			<?php
			if(isset($_GET['pwderr'])){
				echo '<p id="err">Les deux champs ne correspondent pas</p>';
			}
			if(isset($_GET['err'])){
				echo '<p id="err">Remplir les deux champs</p>';
			}
	}//Non connecté
	else {
		header('Location: connexion.php');
		exit();
	}
	include ("End.php");

?>