<?php
	
	include ("Begin.php");
	
	$bdd = Connect_db();
	
	if (isConnected() && isset($_GET["idEvent"]))
	{
		$SQL_Query = 'DELETE FROM Membre_Inscrit_Event
					WHERE Membre_email = "'.$_COOKIE['email'].'" AND Event_Id = '.intval($_GET["idEvent"]);
		
		$query = $bdd->prepare($SQL_Query);
		$query->execute(); 
		
		header('location:EventDescr.php?idEvent='.$_GET["idEvent"]);
	}
	else
		echo '<script>alert(\'Nique ta mère\');</script>';

	

?>