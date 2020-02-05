<!--Ce fichier ajoute l'article écrit à la base de donnée-->
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
	<title>Traitement de l'écriture</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
		<?php
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
	$req = $bdd->prepare("INSERT INTO articles (id_article, titre, pseudo, date, contenu) VALUES (NULL, :titre, :pseudo, CURRENT_TIMESTAMP, :contenu)"); // On prépre une requete qui insère les informations de l'article dans la base de donnée
	$req->execute(array('titre' => $_POST['titre'],'pseudo' => $_SESSION['pseudo'], 'contenu' => $_POST['contenu'])); //On éxecute la requête avec les informations renseignées par l'utilisateur et les données de la session
	$req->closeCursor();
	?>
	<p>Article ajouté ! Revenez à l'accueil en cliquant<a href="accueil.php">ici</a></p> <!--On affiche un message et un lien pour revenir à l'accueil-->
</div>

</body>
</html>