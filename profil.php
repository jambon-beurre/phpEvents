<?php
	include ("Begin.php");

	if(isConnected()){?>
			<br/>
			Vous êtes connecté en tant que : <?php echo $_COOKIE['email']?><br/>

			<h2>Changer de mot de passe</h2>
			<form action="change_mdp.php" method="post">
				<p>Nouveau mot de passe : <input type = "password" name = "pwd1"/></p>
				<p>Confirmer mot de passe : <input type = "password" name = "pwd2"/></p>
				<button type="submit">Valider</button>
			</form>
			
			<h2>Supprimer votre profil</h2>
			<p> La suppression de votre profil est définitive, de plus vous perdrez toutes vos inscriptions aux évenements. </p>
			<button onClick="document.location.href = 'desinscription.php'">Supprimer mon profil</button>
			
			<?php
			if(isset($_GET['pwderr'])){
				echo '<p>Les deux champs ne correspondent pas</p>';
			}
			if(isset($_GET['err'])){
				echo '<p>Remplir les deux champs</p>';
			}
	}//Non connecté
	else {
		header('Location: connexion.php');
		exit();
	}
	include ("End.php");
?>