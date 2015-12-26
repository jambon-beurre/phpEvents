<?php
	include("Begin.php");
	
	if(!(isset($_POST['pwd1']) && isset($_POST['pwd2'])))
		header('location:profil.php');
	else if (strlen($_POST['pwd1']) < 6)
		header('location:profil.php?ShortPwdErr=1');
	else if ($_POST['pwd1'] != $_POST['pwd2'])
		header('location:profil.php?pwdErr=1');
	else if (!isConnected())
		header('location:profil.php');
	else
	{
		$bdd = Connect_db();
		$query = $bdd->prepare('update Membre set password = \''.$_POST['pwd1'] .'\' where email = \''.$_COOKIE['email'].'\'');
		$query->execute();
		setcookie("pwd",$_POST['pwd1'],time()+10000);
		header('location:profil.php?pwdChg=1');
	}

	include("End.php");
?>