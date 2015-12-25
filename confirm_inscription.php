<?php
	include("Begin.php");
	if(isset($_POST['email']) && isset($_POST['pwd1']) && isset($_POST['pwd2'])){

		if($_POST['pwd1'] == $_POST['pwd2']){
			$bdd = Connect_db();
			$query = $bdd->prepare('select email from Membre');
			$query->execute();
			$existe = false;

			while($line = $query->fetch()){
				if($line['email'] == $_POST['email']){
					$existe = true;
				}
			}
			if($existe){
				header('location:inscription.php?emailerr=1');
			}
			else{
				$email = $_POST['email'];
				$pwd = $_POST['pwd1'];
				$query = $bdd->prepare('insert into Membre values(\''.$email.'\',\''.$pwd.'\')');
				$query->execute();
				echo("Vous êtes inscrit!");
				setcookie("email",$email,time()+10000);
				setcookie("pwd",$pwd,time()+10000);
			}
		}

		else{
			header('location:inscription.php?pwderr=1&email='.$_POST['email']);
		}
	}

	else{
		header('location:inscription.php?err=1');
	}

	include("End.php");
?>