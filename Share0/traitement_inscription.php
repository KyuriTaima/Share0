<!--Ce fichier ajoute le nouvel utilisateur à la base de donnée-->
<?php
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
	<title>traitement_inscription</title>
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
	$req = $bdd->prepare("INSERT INTO share (id, nom, prenom, email, pseudo, interets, mdp) VALUES (NULL, :nom, :prenom, :email, :pseudo, :interets, :mdp)"); 
	//On prépare une requête qui va insérer toutes les informations du nouvel utilisateut dans la base de donnée
	$req->execute(array('nom' => $_POST['nom'],'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'pseudo' => $_POST['pseudo'], 'interets' => $_POST['interets'], 'mdp' => $_POST['mdp']));
	//On éxecute la requête avec les informations renseignées par l'utilisateur dans le formulaire

echo 'Vous êtes inscrits !'; //On affiche un message et un lien pour revenir à la page de connexion
	?>
	<br /><a href="connexion.php"><br /><br />Retour à la page de connexion</a> 
</div>
</body>
</html>