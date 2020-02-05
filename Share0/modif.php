<!--Cette page affiche les articles de l'utilisateur et lui demande lequel il souhaite modifier -->
<?php
session_start();
session_start(); //démarrage de la session pour avoir accès aux variables de session
if(isset($_SESSION['pseudo']) == FALSE)
{
    header('Location: http://localhost/Share0/Connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Choix du commentaire à modifier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
	<h1>Selectionnez l'article à modifier</h1>
		<?php
		$pseudo = $_SESSION['pseudo']; //On récupère le pseudo de l'utilisateur
	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
        	die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->query("SELECT * FROM articles WHERE pseudo = '$pseudo' "); //On récupère tous les articles postés par l'utilisateur
	while ($donnee = $req->fetch()) {
		?><p>Article numéro : <?php echo $donnee['id_article']; ?><br />Avec pour titre : <?php echo $donnee['titre']; ?></p> <!--On affiche le numéro de l'article (id) et son titre -->
	<?php
	}
	$req->closeCursor();
	?>
	<form action="modif_com.php" method="post">
		<label>Choisissez le numéro de l'article à modifier : <br /></label><input type="number" name="id_article"> <!--Le formulaire permet de choisir un numéro qui correspondra à l'article modifié  -->
			<input type="submit" value="Validation" />
	</form>
	</div>


</body>
</html>