<!--Ce fichier met à jour l'article avec les nouvelles informations renseignées par l'utilisateur dans le formulaire -->
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
		<h1>Modification d'un article</h1>
		<?php
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
	$req = $bdd->prepare("UPDATE articles SET titre = :titre, contenu = :contenu WHERE id_article = '$id_modif' "); //On prépare une requete qui mettra à jour les informations de l'article
	$req->execute(array('titre' => $_POST['titre'],'contenu' => $_POST['contenu'])); //On éxecute la requete avec les nouvelles données de l'article
	$req->closeCursor();
	?>
	<p>Article mis à jour ! Revenez à l'accueil en cliquant<a href="accueil.php"> ici</a></p> <!--On affiche un message et un lien pour revenir à l'accueil-->
</div>

</body>
</html>