<?php
	include ("Begin.php");

	if(isConnected())
	{
		$bdd = Connect_db();
		$query = $bdd->prepare('SELECT * FROM Membre');
		$query->execute(); 
		while ($line = $query->fetch())
		{
			if ($line['email'] == $_COOKIE['email'])
			{?>
				<h2>Vos Informations</h2>
				Nom : <?php echo$line['Nom'];?><br/>
				Prenom : <?php echo$line['Prenom'];?><br/>
				Email : <?php echo$line['email'];?><br/> <?php
				break;
			}
		}
?>
		<h2>Changer de mot de passe</h2>
		<form action="change_mdp.php" method="post">
			<p>Nouveau mot de passe : <input type = "password" name = "pwd1"/></p>
			<p>Confirmer mot de passe : <input type = "password" name = "pwd2"/></p>
			<button type="submit">Valider</button>
		</form>
	<?php 
		if(isset($_GET['pwdChg']))
			echo ("<p class=\"succes\">Mot de passe modifié avec succès.</p>");
		else if(isset($_GET['pwdErr']))
			echo ("<p class=\"err\">Les mots de passe ne correspondent pas.</p>");
		else if(isset($_GET['ShortPwdErr']))
			echo ("<p class=\"err\">Le mot de passe doit comporter plus de 6 caractères.</p>");
	?>	
		<h2>Supprimer votre profil</h2>
		<p> La suppression de votre profil est définitive, de plus vous perdrez toutes vos inscriptions aux évenements. </p>
		<button onClick="document.location.href = 'desinscription.php'">Supprimer mon profil</button>			
	<?php
	}//Non connecté
	else
	{
		header('Location: connexion.php');
		exit();
	}
	include ("End.php");
?>