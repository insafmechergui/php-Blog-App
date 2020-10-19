<?php
session_start();
include "connexion.php";

$author=$_SESSION["user_id"];
    
    $post=$conn->prepare("SELECT posts.id, `titre`, `contenu`, `date_post`, `user_id`, users.nom AS auteur,url FROM `posts` LEFT join image on image.post_id = posts.id INNER join users on posts.user_id = users.id  where users.id=".$author);
    $post->execute();
	$res = $post->fetch(PDO::FETCH_ASSOC);


$stmt=$conn->prepare("SELECT *from category");
    $stmt->execute();
	$sql = $stmt->fetchALL(PDO::FETCH_ASSOC);


$template = 'author_edit_post';
include 'layout.phtml';	
?>