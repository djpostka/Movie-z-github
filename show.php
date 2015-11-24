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

// On récupère tout le contenu de la table movies
$req = $bdd->query('SELECT * FROM '.$bdd_table.'');

// On affiche chaque entrée une à une
while ($data = $req->fetch())
{
?>

<!-- Debut affichage contenu bdd -->
<H2><?php echo $title_l ?>: <u><?php echo $data['Title']; ?></u></H2>
<img src="<?php echo $data['Poster']; ?>" /><br />
<?php echo $imdbID_l ?>: <?php echo $data['imdbID']; ?><br />
<?php echo $year_l ?>: <?php echo $data['Year']; ?><br />
<?php echo $rate_l ?>: <?php echo $data['Rated']; ?><br />
<?php echo $released_l ?>: <?php echo $data['Released']; ?><br />
<?php echo $runtime_l ?>: <?php echo $data['Runtime']; ?><br />
<?php echo $genre_l ?>: <?php echo $data['Genre']; ?><br />
<?php echo $director_l ?>: <?php echo $data['Director']; ?><br />
<?php echo $actors_l ?>: <?php echo $data['Actors']; ?><br />
<?php echo $plot_l ?>: <?php echo $data['Plot']; ?><br />
<?php echo $language_l ?>: <?php echo $data['Language']; ?><br />
<?php echo $country_l ?>: <?php echo $data['Country']; ?><br />
<?php echo $metascore_l ?>: <?php echo $data['Metascore']; ?><br />
<?php echo $imdbrating_l ?>: <?php echo $data['imdbRating']; ?><br />
<?php echo $imdbvotes_l ?>: <?php echo $data['imdbVotes']; ?><br />
<!-- Fin affichage contenu bdd -->

<?php
}

// Termine le traitement de la requête
$req->closeCursor(); 

?>