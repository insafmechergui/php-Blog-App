<?php
	
	include "connexion.php";
	session_start();


	$post=$conn->prepare("SELECT posts.id, `titre`, `contenu`, `date_post`, `user_id`, category.nom AS nom, users.nom AS auteur, users.prenom AS prenom,url FROM `posts` LEFT join image on image.post_id = posts.id INNER join category on category.id = posts.category_id INNER join users on posts.user_id = users.id order by date_post DESC ");
    $post->execute();
	$res = $post->fetchAll(PDO::FETCH_ASSOC);


	//LEFT join users on users.id = posts.user_id where users.role_id=3

//print_r($res);
	$template = 'home';
    include 'layout.phtml';	

?>