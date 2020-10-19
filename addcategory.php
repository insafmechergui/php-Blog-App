<?php
include "connexion.php";
        $category = $_GET['category'];

		$post = $conn->prepare("INSERT INTO category  VALUES (0,?)");
		$post->execute([$category]);


?>