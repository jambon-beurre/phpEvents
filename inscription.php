<?php
	include ("Begin.php");

?>

<form action = "confirm_inscription.php" method = "post">
	<p>Adresse mail : <input type = "email" name = "email" 
					<?php 
						if(isset($_GET['email'])){
							echo ("value=\"".$_GET['email']."\"");
						}
						
						?>></p>

	<p>Mot de passe : <input type = "password" name = "pwd1"></p>
	<p>Confirmer mot de passe : <input type = "password" name = "pwd2"></p>

	<?php 
		if(isset($_GET['err'])){
			echo ("<p class=\"err\">Veuillez remplir tous les champs</p>");
		}
		else if(isset($_GET['emailerr'])){
			echo ("<p class=\"err\">Il y a déjà un compte enregistré à cette adresse mail</p>");
		}
		else if(isset($_GET['pwderr'])){
			echo ("<p class=\"err\">Les mots de passe ne correspondent pas</p>");
		}
	?>

	<button type = "submit">S'inscrire</button>
</form>

<?php
	include("End.php");
?>