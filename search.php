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


// On démarre la session pour envoyer les données vers la page d'enregistrement
session_start (); 

// Appel du fichier de config
require('conf.php');

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!-- Debut formulaire de recherche --> 
<form action="search.php" method="post">
	<p>Rechercher par</p>
	<p>Titre du film: <br /><input type="text" name="name" /></p>
	<p>Année : <br /><input type="text" name="year" /></p>
	<p>Ou par</p>
	<p>Id IMDB : <br /><input type="text" name="id_imdb" /></p>
	<p><input type="submit" value="Rechercher"></p>
</form>

<?php

	if( isset( $_SESSION['result'] ) ) $result = $_SESSION['result'];
	else $result = "";
	echo $result;
	
?>

<!-- Fin formulaire de recherche --> 

<br />
<br />
---------------------------------------------------------------------------------------
<br />
<br />
<br />


<?php  

// Récupération données formulaire

// On vérifie si $_POST['name'] est vide 
if( isset( $_POST['name'] ) ) $title = $_POST['name'];
else $title = "";

// On vérifie si $_POST['yeay'] est vide 
if( isset( $_POST['year'] ) ) $year = $_POST['year'];
else $year = "";

// On vérifie si $_POST['id_imdb'] est vide 
if( isset( $_POST['id_imdb'] ) ) $id_imdb = $_POST['id_imdb'];
else $id_imdb = "";

// encodage du nom pour l'url
$title = urlencode($title);

// Si le champ ID IMDB renseigner
if(!empty($_POST['id_imdb']))
{
	
// Recherche par id IMDB
$json=file_get_contents("http://www.omdbapi.com/?i=$id_imdb&r=json");
}
else
{
	
// Si non recherche par nom et date
$json=file_get_contents("http://www.omdbapi.com/?t=$title&y=$year&r=json");	
}

// Décodage du retour de la requete
$details=json_decode($json);

// Si retour on affiche le resultat si non message erreur
if($details->Response=='True')
{   

    // On affiche le resultat de la recherche
    echo "ID IMDB: ".$details->imdbID.'<br>';
    echo "Title : ".$details->Title.'<br>';
    echo "Year : ".$details->Year.'<br>';
    echo "Rated : ".$details->Rated.'<br>';
    echo "Poster Image Path: ".$details->Poster.'<br>';
    echo "<img src=\"$details->Poster\"><br>";
    echo "Released Date: ".$details->Released.'<br>';
    echo "Runtime : ".$details->Runtime.'<br>';
    echo "Genre : ".$details->Genre.'<br>';
    echo "Director : ".$details->Director.'<br>';
    echo "Writer : ".$details->Writer.'<br>';
    echo "Actors : ".$details->Actors.'<br>';
    echo "Plot : ".$details->Plot.'<br>';
    echo "Language : ".$details->Language.'<br>';
    echo "Country : ".$details->Country.'<br>';
    echo "Awards : ".$details->Awards.'<br>';
    echo "Metascore : ".$details->Metascore.'<br>';
    echo "IMDB Rating : ".$details->imdbRating.'<br>';
    echo "IMDB Votes : ".$details->imdbVotes.'<br>';
	echo "<a href=\"rec.php\">Enregistrer</a><br><br>";
	
	// On défini la variable SESSION
	$_SESSION['details'] = $details;
}

// Message si champ vide ou aucun résultats
else 
{
     echo "Aucune résultats.";
	 unset($_SESSION['result']);
}
?>