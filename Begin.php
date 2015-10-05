<?php
function Connect_db(){
	$host="iutdoua-webetu.univ-lyon1.fr";
	$user="p1403498";
	$password="212840";
	$bdname="p1403498";
	try{
		$bdd=new PDO('mysql:host='.$host.';dbname='.$bdname.
			';charset=utf8',$user,$password);
		return $bdd;
	}
	catch(Exception $e){
		die('Erreur: ' .$e->getMessage());
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>php Events</title>
	<meta charset="utf-8"/>


</head>

<body>

	<header>
		<a href="index.php">Accueil</a>
		<a href="events.php">Evenements</a>
		<?php

		$connected = false;
		Connect_db();

		if ($connected){
			echo '<a href="profil.php">Profil</a>';
		}
		else{
			echo '<a href="connexion.php">Connexion</a>';
		}

		?>
		
	</header>