<?php

	include ("Begin.php");

	//En cours de connexion
	if(isset($_POST['email']) && isset($_POST['pwd'])){
		setcookie("email",$_POST['email'],time()+10000);
		setcookie("pwd",$_POST['pwd'],time()+10000);
		header('Location: connexion.php');
		exit();
	} //Tentative de connexion
	else if(isset($_COOKIE['email']) && isset($_COOKIE['pwd'])){
		if (isConnected()){
			echo 'Vous êtes connecté en tant que : '. $_COOKIE['email'] . '<br/>';
			echo '<a href="deconnexion.php">Déconnexion</a>';
		}
		else
			echo 'Afficher page de co ^^';
	}//Non connecté
	else {
		echo 	'<form action ="connexion.php" method="post">
			<p>Adresse mail : <input type="email" name="email"/></p>
			<p>Mot de passe : <input type="password" name="pwd"/></p>
			<button type="submit" value="Calculer">Connexion</button>
		</form>';
	}
	include ("End.php");

?>