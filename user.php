<?php
include "connexion.php";


		
if(isset($_POST['nom'])){	
   
        $nom= $_POST['nom'];
		$pren= $_POST['prenom'];
		$mail= $_POST['mail'];
		$pass= md5($_POST['pass']);
		$user= $_POST['admin'];
    
    if($user == "admin"){
        $sql = "INSERT INTO users (nom, prenom, email,password, role_id) VALUES (?,?,?,?,2)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([ $nom, $pren, $mail, $pass ]);

    }
    else if($user == "auteur"){
        $sql = "INSERT INTO users (nom, prenom, email,password, role_id) VALUES (?,?,?,?,3)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([ $nom, $pren, $mail, $pass ]);
    }
  


}

		

//header("Location: admin.php");	
?>