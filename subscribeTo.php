<?php
	
	include ("Begin.php");
	
	$bdd = Connect_db();

	//TODO check connected, notInscripted
	
	if (isConnected() && isset($_GET["idEvent"]))
	{
		$SQL_Query = 'INSERT INTO Membre_Inscrit_Event (Membre_email, Event_Id, Date)
					VALUES ("'.$_COOKIE['email'].'",'.intval($_GET["idEvent"]).', NOW())';
		
		$query = $bdd->prepare($SQL_Query);
		$query->execute(); 
	}
	else if (isset($_GET["idEvent"]))
		header('location:EventDescr.php?idEvent='.$_GET["idEvent"]);
	else 
		header('location:events.php');
?>