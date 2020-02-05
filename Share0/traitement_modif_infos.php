<!--Ce fichier met à jour les informations de l'utilisateur avec celles qu'il a renseigné dans le formualaire-->
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
	<title>Traitement de modification d'informations personnelles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
		<h1>Modification des informations personnelles</h1>
		<?php
		$id_modif = $_SESSION['id']; //On stocke l'identifiant de l'utilisateur dans une variable
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
	$req = $bdd->prepare("UPDATE share SET nom = :nom, prenom = :prenom, email = :email, pseudo = :pseudo, interets = :interets, mdp = :mdp WHERE id = '$id_modif' ");
	// On prépare une requete qui mettra à jour la base de donnée avec les nouvelles informations de l'utilisateur
	$req->execute(array('nom' => $_POST['nom'],'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'pseudo' => $_POST['pseudo'], 'interets' => $_POST['interets'], 'mdp' => $_POST['mdp']));
	// On éxecute la requête avec les informations du formulaire passées en paramètres
	$req->closeCursor();
	?>
	<p>Informations personnelles mises à jour ! Revenez à l'accueil en cliquant<a href="accueil.php"> ici</a></p> <!--On affiche un message et un lien pour revenir à la page d'accueil-->
</div>

</body>
</html>