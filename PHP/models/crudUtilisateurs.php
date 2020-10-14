<?php

function insertUtilisateur($database, $nom, $prenom, $pays, $date_naissance, $mail, $genre = 2) {
	$sql = "INSERT INTO utilisateurs (nom, prenom, pays, date_naissance, mail, genre) VALUES ('$nom', '$prenom', '$pays', '$date_naissance', '$mail', $genre);";

	$result = mysqli_query($database, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($database) . "<br>";
}

function updateUtilisateur($database, $nom, $prenom, $pays, $date_naissance, $mail, $genre, $id) {
	$sql = "UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', pays = '$pays', date_naissance = '$date_naissance', mail = '$mail', genre = $genre WHERE id = $id";
	
	$result = mysqli_query($database, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($database) . "<br>";
}

function deleteUtilisateur($database, $id) {
	$sql = "DELETE FROM utilisateurs WHERE id = $id";
	
	$result = mysqli_query($database, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($database) . "<br>";
}

function selectAllUtilisateur($database) {
	$sql = "SELECT * FROM utilisateurs";
	
	$result = mysqli_query($database, $sql); // Jeu de résultat, contient seulement des infos sur les données mais il faut encore récupérer les données
	
	if($result) {
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}

function selectUtilisateurById($database, $id) {
	$sql = "SELECT * FROM utilisateurs WHERE id = $id";
	
	$result = mysqli_query($database, $sql); // Jeu de résultat, contient seulement des infos sur les données mais il faut encore récupérer les données
	
	if($result) {
		$data = mysqli_fetch_assoc($result);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}

function selectUtilisateurByName($database, $recherche) {
	$sql = "SELECT * FROM utilisateurs WHERE CONCAT(nom, ' ', prenom) LIKE '%$recherche%' OR CONCAT(prenom, ' ', nom) LIKE '%$recherche%' LIMIT 1";
	
	$result = mysqli_query($database, $sql); // Jeu de résultat, contient seulement des infos sur les données mais il faut encore récupérer les données
	
	if($result) {
		$data = mysqli_fetch_assoc($result);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}