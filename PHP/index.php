<?php

require_once 'config.php';

$db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PWD, DB_NAME, DB_PORT) OR die("La connection à la base de données a échouée");
mysqli_set_charset($db, DB_CHARSET);

/*
Page d'accueil (Read Posts)
Page lecture (Read Post)
Page de formulaire (Create Post)
Page de formulaire (Update Post)

Page d'infos utilisateur (Read User - infos utilisateurs, les posts de l'utilisateur)
Page de formulaire (Create User)
Page de formulaire (Update User)
*/

if (isset($_GET["page"])) {
	$page = $_GET["page"];
	
	switch ($page) {
		case "post":
			require_once './views/' . $page . '.php';
			break;
		case "insertPost":
			require_once './views/' . $page . '.php';
			break;
		case "updatePost":
			require_once './views/' . $page . '.php';
			break;
		case "user":
			require_once './views/' . $page . '.php';
			break;
		case "insertUser":
			require_once './views/' . $page . '.php';
			break;
		case "updateUser":
			require_once './views/' . $page . '.php';
			break;
		default:
			require_once './views/accueil.php';
	}
} else {
	require_once './views/accueil.php';
}