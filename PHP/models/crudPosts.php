<?php

echo "crudPosts.php<br>";

function insertPost($titre, $message, $idUtilisateur) {
	global $db;
	$sql = "INSERT INTO posts (titre, message, utilisateurs_id) VALUES ('$titre', '$message', $idUtilisateur);";

	$result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}

// echo insertPost("Les milles et une nuits", "Magnifique conte", 1);

"SELECT * FROM posts WHERE titre = '$titre'";