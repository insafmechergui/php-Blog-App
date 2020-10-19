<?php
session_start();
include "connexion.php";

    $author=$_SESSION["user_id"];
    
    $post=$conn->prepare("SELECT posts.id, `titre`, `contenu`, `date_post`, `user_id`, category.nom AS nom, users.nom AS auteur,url FROM `posts` LEFT join image on image.post_id = posts.id INNER join category on category.id = posts.category_id INNER join users on posts.user_id = users.id where users.id = ".$author." order by date_post DESC");
    $post->execute();
	$res = $post->fetchAll(PDO::FETCH_ASSOC);

//print_r($res);
	

$template = 'author';
include 'layout.phtml';	
?>