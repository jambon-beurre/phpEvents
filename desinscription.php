<?php
	include("Begin.php");
	if(isConnected())
	{
			$bdd = Connect_db();
			
			$email = $_COOKIE['email'];
			
			$query = $bdd->prepare('DELETE FROM Membre WHERE email = \''. $email.'\'');
			$query->execute();

			$query = $bdd->prepare('DELETE FROM Membre_Inscrit_Event WHERE Membre_email = \''.$email.'\'');
			$query->execute();
	}
	
	header('location:connexion.php?unreg=1');

	include("End.php");
?>