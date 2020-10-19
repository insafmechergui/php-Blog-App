<?php
	
	session_start();
	include "connexion.php";

    $sql = $conn->prepare("SELECT * from users where role_id = 3 ");
	$sql->execute();
	$res = $sql->fetchAll(PDO::FETCH_CLASS);

	$post = $conn->prepare("SELECT * from category ");
	$post->execute();
	$cat = $post->fetchAll(PDO::FETCH_CLASS);



if(!empty($_POST['title'])){
	//print_r($_POST);
	$titre= $_POST['title'];
	$contents= $_POST['content'];
	$catID= $_POST['category'];
	$authID= $_SESSION["user_id"];
    $img= $_FILES["image"]["name"];
	$time= date('Y-m-d H:i:s');

	//print_r($_POST);
	
	//insertion image
	if(!empty($_FILES["image"]["name"])){
			$sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
			$targetPath = "image/".$_FILES['image']['name']; // Target path where file is to be stored
			//move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
			$img=$_FILES["image"]["name"];
			
			if (!move_uploaded_file($sourcePath, $targetPath)) {
				echo json_encode("Sorry, there was an error uploading your file.");
			}
	}

	$sql3 = $conn->prepare("INSERT INTO posts VALUES (?,?,?,?,?,?)");
    
	$sql3->execute([0, $titre, $contents,$time, $authID, $catID]);
    $post_id=$conn->lastInsertId();
		//echo json_encode('OK');
    
    $sql = $conn->prepare("INSERT INTO image VALUES (?,?,?)");
    $sql->execute([0, $img, $post_id]);
}

$template = 'postadd';
include 'layout.phtml';	
?>