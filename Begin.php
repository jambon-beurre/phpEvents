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

function isConnected(){
	if (isset($_COOKIE['email']) && isset($_COOKIE['pwd']))
	{			
		$bdd = Connect_db();
		$query = $bdd->prepare('SELECT email, password FROM Membre');
		$query->execute(); 
		while ($line = $query->fetch())
		{
			if ($line['email'] == $_COOKIE['email'] 
				&& $line['password'] == $_COOKIE['pwd'])
			{
				return true;
			}
		}
	}
	return false;
}



?>

<!DOCTYPE html>
<html>

<head>
	<title>php Events</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>	
		<a href="accueil.php">Accueil</a>
		<?php echo (isConnected()?'<a href="profil.php">Profil</a> <a href="deconnexion.php">Déconnexion</a>':'<a href="connexion.php">Connexion</a>');?>
		
	</header>
	