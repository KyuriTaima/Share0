<!--Affiche les articles de l'utilisateur et lui permet de choisir lequel supprimé-->
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
	<title>Choix de l'article à supprimer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
	<h1>Selectionnez l'article à supprimer</h1>
		<?php
		$pseudo = $_SESSION['pseudo'];
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
	$req = $bdd->query("SELECT * FROM articles WHERE pseudo = '$pseudo' "); //Récupère les articles rédigés par l'utilisateur
	while ($donnee = $req->fetch()) {
		?><p>Article numéro : <?php echo $donnee['id_article']; ?><br />Avec pour titre : <?php echo $donnee['titre']; ?></p> <!--Affiche le numéro de l'article ainsi que le titre lui correspondant -->
	<?php
	}
	$req->closeCursor();
	?>
	<!--Permet à l'utilisateur d'envoyer le numéro de l'article qu'il souhaite supprimer-->
	<form action="traitement_suppression.php" method="post">
		<label>Choisissez le numéro de l'article à supprimer :<br /></label><input type="number" name="id_article">
			<input type="submit" value="Validation" />
	</form>
</div>
</body>
</html>