<?php
include "connexion.php";
$template = 'login';
include 'layout.phtml';	
if(!empty($_POST['pass'])){
		$mail= $_POST['mail'];
		$pass= md5($_POST['pass']);
				
		$sql = $conn->prepare("SELECT * from users where email=? && password=?");
		$sql->execute([$mail,$pass]);
		$row = $sql->fetch();

		if(!$row){
			echo "Email ou mot de passe est incorrect";
		}else{
			session_start();
			$_SESSION['nom']=$row['nom'];
			$_SESSION['prenom']=$row['prenom'];
			$_SESSION['email']=$row['email'];
			$_SESSION['role_id']=$row['role_id'];
			$_SESSION['user_id']=$row['id'];
/*
			if($_SESSION['role_id'] == 2){
				header("Location: admin.php");
			}
            else if($_SESSION['role_id'] == 3){
				header("Location: author.php");
            }
            else {*/
				
			 header("Location: home.php");
	/*	}
	*/
    }


}

	
?>