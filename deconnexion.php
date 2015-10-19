<?php
		//Supression des cookies
		setcookie("email","lol",time()-1);
		setcookie("pwd","lol",time()-1);
		header('Location: connexion.php');
		exit();
?>