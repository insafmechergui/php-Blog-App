<?php 
include "connexion.php";
session_start();

if(!empty($_GET['id']))
{
    $postid = $_GET['id'];

	$post=$conn->prepare("SELECT posts.id, `titre`, `contenu`, `date_post`, `user_id`, category.nom AS nom, users.nom AS auteur,url FROM `posts` LEFT join image on image.post_id = posts.id INNER join category on category.id = posts.category_id INNER join users on posts.user_id = users.id where posts.id = $postid");
	

	$post->execute();
	$res = $post->fetchAll(PDO::FETCH_ASSOC);



	$stmt=$conn->prepare("SELECT commentaire.id, contenu, date_commentaire, post_id, user_id, users.nom, users.prenom, users.email  FROM commentaire INNER JOIN users on users.id = commentaire.user_id where post_id =".$postid." group by date_commentaire DESC ");

	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


$template = 'commentaire';
include 'layout.phtml';	  