<?php
	include("Begin.php");
	
	if(!(isset($_POST['email']) && $_POST['email'] != "" ))
		header('location:inscription.php?emptyErr=1');
	else if(!(isset($_POST['Nom']) && $_POST['Nom'] != ""
		&& isset($_POST['Prenom']) && $_POST['Prenom'] != ""
		&& isset($_POST['pwd1']) && $_POST['pwd1'] != ""
		&& isset($_POST['pwd2'])&& $_POST['pwd2'] != "" ))
			header('location:inscription.php?emptyErr=1&email='.$_POST['email']);
	else if (strlen($_POST['pwd1']) < 6)
		header('location:inscription.php?ShortPwdErr=1&email='.$_POST['email']);
	else if ($_POST['pwd1'] != $_POST['pwd2'])
		header('location:inscription.php?pwdErr=1&email='.$_POST['email']);
	else
	{
		$bdd = Connect_db();
		$query = $bdd->prepare('select email from Membre');
		$query->execute();
		$existe = false;

		while($line = $query->fetch())
		{
			if($line['email'] == $_POST['email'])
			{
				$existe = true;
				header('location:inscription.php?emailErr=1');
				break;
			}
		}
		
		if($existe == false)
		{
			$query = $bdd->prepare("INSERT INTO Membre VALUES ('".$_POST['email']."','".$_POST['pwd1']."','".$_POST['Nom']."','".$_POST['Prenom']."')");
			$query->execute();
			setcookie("email",$_POST['email'],time()+10000);
			setcookie("pwd",$_POST['pwd1'],time()+10000);
			header('location:profil.php');
		}
	}
	include("End.php");
?>