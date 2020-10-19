<?php
include "connexion.php";
	

	if (!empty($_POST['nom'])){
		$nom= $_POST['nom'];
		$pren= $_POST['prenom'];
		$mail= $_POST['mail'];
		$pass= md5($_POST['pass']);
				
		$sql = "INSERT INTO users (nom, prenom, email,password) VALUES (?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([ $nom, $pren, $mail, $pass ]);

		// $sql1 = $conn->prepare("SELECT email from users where email=? ");
		// $sql1->execute([$mail]);
		// $row = $sql1->fetch();
		
		// if($row==true){
			
		// 	echo"email existe déjà";

		// }else
		// {
		// 	echo"inscription terminée";
		// 	
		// }

		
			 header("Location: home.php");

	}
	
	else {
        $template = 'inscription';
        include 'layout.phtml';
    }

   

?>