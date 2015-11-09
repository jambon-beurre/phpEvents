<?php
	include("Begin.php");
	if(isset($_POST['pwd1']) && isset($_POST['pwd2'])){

		if($_POST['pwd1'] == $_POST['pwd2']){
			$existe = false;
			$email = $_COOKIE['email'];

			$bdd = Connect_db();
			$query = $bdd->prepare('update Membre set password = \''.$_POST['pwd1'] .'\' where email = \''.$email.'\'');
			$query->execute();
			echo 'Mot de passe modifié avec succès';
			setcookie("pwd",$_POST['pwd1'],time()+10000);
		}

		else{
			header('location:profil.php?pwderr=1');
		}
	}

	else{
		header('location:inscription.php?err=1');
	}
?>


<?php
	include("End.php");
?>