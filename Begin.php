<?php
function Connect_db(){
	$host="iutdoua-webetu.univ-lyon1.fr";
	$user="p1403498";
	$password="212840";
	$bdname="p1403498";
	try{
		$bdd = new PDO('mysql:host='.$host.';dbname='.$bdname.
			';charset=utf8',$user,$password);
		return $bdd;
	}
	catch(Exception $e)
	{
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
		<a href="connexion.php">Connexion</a>
		<!--
		<?php

		$connected = false;
		
		if (isset($_GET['email']) && isset($_GET['password']))
		{			
			$bdd = Connect_db();
			$query = $bdd->prepare('SELECT email, password FROM Membre');
			$query->execute(); 
			while ($line = $query->fetch()) //Si il l'est déja, on modifie
			{
				if ($line['email'] == $_GET['email'] && $line['password'] == $_GET['password'])
				{
					$connected = true;
					break;
				}
			}
		}
	
		if ($connected){
			echo '<a href="profil.php">Profil</a>';
		}
		else{
			echo '<a href="connexion.php">Connexion</a>';
		}

		?>
		-->
	</header>