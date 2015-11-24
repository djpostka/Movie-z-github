<?php 

//////////////////////////////////////////
// ___  ___           _      _ ______	//
// |  \/  |          (_)    ( )___  /	//
// | .  . | _____   ___  ___|/   / / 	//
// | |\/| |/ _ \ \ / / |/ _ \   / /  	//
// | |  | | (_) \ V /| |  __/ ./ /___	//	
// \_|  |_/\___/ \_/ |_|\___| \_____/	//
//										//
//		Make your own movie database	//
//			from IMDB informations		//
//										//
//			Created By djpostka			//
//					2015				//
//										//
//		Free Use, Edit & share			//
//										//
//////////////////////////////////////////


// On démarre la session pour récuperer les données de la page de recherche
session_start (); 

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php 

// Appel du fichier de config
require('conf.php');

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host='.$bdd_host.';dbname='.$bdd_db.';charset=utf8', $bdd_user, $bdd_password);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
	// On récupère les données de la variable SESSION
	$details = $_SESSION['details'];


	// On verifie si le film existe dans la base
	$check = $bdd->prepare('SELECT COUNT(*) FROM '.$bdd_table.' WHERE imdbID = :imdbID');
	$check->execute(array(
	'imdbID' => $details->imdbID,
	));
	
	//si il existe, on arrête le script
	if ($check->fetchColumn() != 0){
		
		// On defini la variable de résultat et on redirige
		$_SESSION['result'] =  "Le Fim existe déjà. Aucune infos n'on été enregistrer dans la base.";
		header('Location: search.php');
	}
	else{	
	
	// Si non, on enregistre l'affiche du film
	$url = $details->Poster;
	$img = "./posters/".$details->imdbID.".jpg";
	
	// On vérifie que l'affiche n'existe pas
	if (file_exists($img)) {
		
	// Si elle existe on éxecute le reste du script
	} 
	else 
	{
		
	// Si elle n'existe pas, on la copie avant d'éxecuté le reste du script
	file_put_contents($img, file_get_contents($url));
	}
	
	// On enregistre les infos dans la BDD
	$req = $bdd->prepare('INSERT INTO '.$bdd_table.'(ID, imdbID, Title, Year, Rated, Poster, Released, Runtime, Genre, Director, Writer, Actors, Plot, Language, Country, Awards, Metascore, imdbRating, imdbVotes) VALUES(:ID, :imdbID, :Title, :Year, :Rated, :Poster, :Released, :Runtime, :Genre, :Director, :Writer, :Actors, :Plot, :Language, :Country, :Awards, :Metascore, :imdbRating, :imdbVotes)');
	$req->execute(array(
	'ID' => '',
	'imdbID' => $details->imdbID,
	'Title' => $details->Title,
	'Year' => $details->Year,
	'Rated' => $details->Rated,
	'Poster' => $img,
	'Released' => $details->Released,
	'Runtime' => $details->Runtime,
	'Genre' => $details->Genre,
	'Director' => $details->Director,
	'Writer' => $details->Writer,
	'Actors' => $details->Actors,
	'Plot' => $details->Plot,
	'Language' => $details->Language,
	'Country' => $details->Country,
	'Awards' => $details->Awards,
	'Metascore' => $details->Metascore,
	'imdbRating' => $details->imdbRating,
	'imdbVotes' => $details->imdbVotes,
	));
	
		// On defini la variable de résultat et on redirige
		$_SESSION['result'] =  "Le film à bien été enregistrer dans la base.";
		header('Location: search.php');
		
	// Termine le traitement de la requête
	$req->closeCursor();	
	}
	
	// Termine le traitement de la requête
	$check->closeCursor();
	
	// On vide la variable
	unset($_SESSION['details']);
	


?>