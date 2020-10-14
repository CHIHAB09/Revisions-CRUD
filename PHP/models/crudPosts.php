<?php

function insertPost($database, $titre, $message, $idUtilisateur) {
	$sql = "INSERT INTO posts (titre, message, utilisateurs_id) VALUES ('$titre', '$message', $idUtilisateur);";

	$result = mysqli_query($database, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($database) . "<br>";
}

function updatePost($database, $titre, $message, $id) {
	$sql = "UPDATE posts SET titre = $titre, message = $message WHERE id = $id";
	
	$result = mysqli_query($database, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($database) . "<br>";
}

function deletePost($database, $id) {
	$sql = "DELETE FROM posts WHERE id = $id";
	
	$result = mysqli_query($database, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($database) . "<br>";
}

function selectAllPosts($database) {
	$sql = "SELECT * FROM posts";
	
	$result = mysqli_query($database, $sql); // Jeu de résultat, contient seulement des infos sur les données mais il faut encore récupérer les données
	
	if($result) {
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}

function selectPostById($database, $id) {
	$sql = "SELECT * FROM posts WHERE $id = $id LIMIT 1";
	
	$result = mysqli_query($database, $sql); // Jeu de résultat, contient seulement des infos sur les données mais il faut encore récupérer les données
	
	if($result) {
		$data = mysqli_fetch_assoc($result);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}

function selectPostByTitle($database, $titre) {
	$sql = "SELECT * FROM posts WHERE titre LIKE '%$titre%' LIMIT 1";
	
	$result = mysqli_query($database, $sql); // Jeu de résultat, contient seulement des infos sur les données mais il faut encore récupérer les données
	
	if($result) {
		$data = mysqli_fetch_assoc($result);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}