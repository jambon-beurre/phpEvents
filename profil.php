<?php

	include ("Begin.php");

	if(isConnected()){
			echo 'Vous êtes connecté en tant que : '. $_COOKIE['email'] . '<br/>';
			echo '<a href="deconnexion.php">Déconnexion</a>';
	}//Non connecté
	else {
		header('Location: connexion.php');
		exit();
	}
	include ("End.php");

?>