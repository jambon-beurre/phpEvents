<?php
	include ("Begin.php");

?>

<form id="regForm" action = "confirm_inscription.php" method = "post">
	<p>Prenom : <input type = "text" name = "Prenom"></p>
	<p>Nom : <input type = "text" name = "Nom"></p>
	<p>Adresse mail : <input type = "email" name = "email" 
					<?php 
						if(isset($_GET['email'])){
							echo ("value=\"".$_GET['email']."\"");
						}
						
						?>></p>
	<p>Mot de passe : <input type = "password" name = "pwd1"></p>
	<p>Confirmer mot de passe : <input type = "password" name = "pwd2"></p>

	<?php 
		if(isset($_GET['emptyErr'])){
			echo ("<p class=\"err\">Veuillez remplir tous les champs.</p>");
		}
		else if(isset($_GET['emailErr'])){
			echo ("<p class=\"err\">Il y a déjà un compte enregistré à cette adresse mail.</p>");
		}
		else if(isset($_GET['pwdErr'])){
			echo ("<p class=\"err\">Les mots de passe ne correspondent pas.</p>");
		}
		else if(isset($_GET['ShortPwdErr'])){
			echo ("<p class=\"err\">Le mot de passe doit comporter plus de 6 caractères.</p>");
		}
		
		
	?>

	<button type="submit">S'enregistrer</button>
</form>

<?php
	include("End.php");
?>