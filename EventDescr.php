<?php
	
	include ("Begin.php");
	
	$bdd = Connect_db();

	if (isset($_GET["idEvent"]))
	{
		$SQL_Query = 'SELECT idEvent FROM Event WHERE idEvent = ' . intval($_GET["idEvent"]);
		
		$query = $bdd->prepare($SQL_Query);
		$query->execute(); 
		if (!($line = $query->fetch()))
			header('location:events.php');
	}
	else
		header('location:events.php');
?>

	<h1>Description de l'évenement</h1>

<?php
	
	$SQL_Query = '	SELECT idEvent, Event.Nom eNom, Type.Nom tNom, Lieu 
					FROM Event JOIN Type ON Event.idType = Type.idType
					WHERE idEvent = ' . intval($_GET["idEvent"]);
	 
	$query = $bdd->prepare($SQL_Query);
	$query->execute(); 
	while ($line = $query->fetch())
	{
		echo 'Id : '.$line['idEvent'].'<br/>
		Nom : '.$line['eNom'].'<br/>
		Type : '.$line['tNom'].' <br/>
		Lieu : '.$line['Lieu'].'<br/>';
	}
	
	//Check if the connected guy has subscribe.
	$inscrit = false;
	
	if (isConnected())
	{
		$SQL_Query = 'SELECT * FROM Membre_Inscrit_Event WHERE Membre_email = "' . $_COOKIE['email'] . '" AND Event_Id = ' . intval($_GET["idEvent"]);
		$query = $bdd->prepare($SQL_Query);
		$query->execute();
		if (($line = $query->fetch()))
			$inscrit = true;
	}

	if (isConnected() && $inscrit == false)
	{ ?>
		<form action="subscribeTo.php?idEvent=<?php echo intval($_GET["idEvent"]); ?>" method="post">
		   <button type="submit">S'Inscrire</button>
		</form>
	<?php }
	else if (isConnected() && $inscrit == true)
	{?>
		Vous etes déja inscrit. "Se désinscrire".
	<?php }
	else
	{?>
		Vous devez etre connecté pour vous inscrire a un evenement, lien connection blablabla ..
	<?php } ?>
	
	<h1>Liste des inscrits </h1>

<?php
	
	$SQL_Query = 'SELECT Membre_email
				FROM Membre_Inscrit_Event
				WHERE Event_Id = '. intval($_GET['idEvent']).'
				ORDER BY Date';
	 
	$query = $bdd->prepare($SQL_Query);
	$query->execute(); 
	while ($line = $query->fetch())
	{
		echo 'Inscrit : '.$line['Membre_email'].'<br/>';
	}
?>
	
<?php
	include ("End.php");
?>