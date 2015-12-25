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
	
	$SQL_Query = '	SELECT idEvent, Event.Nom eNom, Type.Nom tNom, Lieu, Event.Description
					FROM Event JOIN Type ON Event.idType = Type.idType
					WHERE idEvent = ' . intval($_GET["idEvent"]);
	 
	$query = $bdd->prepare($SQL_Query);
	$query->execute(); 
	while ($line = $query->fetch())
	{
		echo '<h1>'.$line['eNom'].'</h1>';
		if (file_exists('EventPics/'.$line['idEvent'].'.jpg'))
			echo '<img src="EventPics/'.$line['idEvent'].'.jpg"/>';
		echo '<p>'.$line['Description'].'</p>
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
		<br/>
		<form action="subscribeTo.php?idEvent=<?php echo intval($_GET["idEvent"]); ?>" method="post">
		   <button type="submit">S'Inscrire</button>
		</form>
	<?php }
	else if (isConnected() && $inscrit == true)
	{?>
		<br/>
		Vous etes inscrit.
		<br/>
		<form action="unSubscribeTo.php?idEvent=<?php echo intval($_GET["idEvent"]); ?>" method="post">
		   <button type="submit">Se désinscrire</button>
		</form>
	<?php }
	else
	{?>
		<br/>
		Vous devez etre connecté pour vous inscrire a un evenement : <a href="connexion.php">Se connecter</a>.
	<?php } ?>
	
	<h2>Liste des inscrits </h2>

<?php
	
	$SQL_Query = 'SELECT Membre_email, Nom, Prenom
				FROM Membre_Inscrit_Event JOIN Membre ON Membre.email = Membre_Inscrit_Event.Membre_email
				WHERE Event_Id = '. intval($_GET['idEvent']).'
				ORDER BY Date';
	 
	$query = $bdd->prepare($SQL_Query);
	$query->execute(); 
	while ($line = $query->fetch())
	{
		echo $line['Prenom'].' '.$line['Nom'].' ('.$line['Membre_email'].')<br/>';
	}
?>
	
<?php
	include ("End.php");
?>