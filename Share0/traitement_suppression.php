<!--Ce fichier supprime l'article que l'utilisateur souhaite supprimer-->
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
	<title>Traitement de modification d'article</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
	<h1>Element supprimé</h1>
		<?php
		//On stocke dans des variables l'id de l'article à supprimer, le pseudo de l'utilisateur
		$id = $_POST['id_article'];
		$pseudo = $_SESSION['pseudo'];
		$_SESSION['id_modif'] = $id;
		$id_modif = $_SESSION['id_modif'];
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
	$req = $bdd->query("SELECT * FROM articles WHERE id_article = '$id' "); //On récupère les informations correspondants à l'id de l'article entré par l'utilisateur dans le formulaire de sélection de l'article à supprimer
	$donnee = $req->fetch();
	if ($pseudo != $donnee['pseudo']) { // Si les pseudos ne correspondent pas, l'utilisateur ne pouvant pas supprimer un article qu'il n'a pas écrit, sa demande de suppression est rejetée
		echo 'erreur, numéro incorrect';
		?> <a href="accueil.php">Retour à l'accueil</a><?php
	}
	else //Si c'est bien son article
	{
	$req = $bdd->prepare("DELETE FROM articles WHERE id_article = '$id_modif' "); //On supprime l'article de la base de donnée
	$req->execute(array());
	?>
	<p>Article supprimé ! Revenez à l'accueil en cliquant<a href="accueil.php"> ici</a></p>
	<?php
	}
	$req -> closeCursor();
	?>
	</div>

</body>
</html>