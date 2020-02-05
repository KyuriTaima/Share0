<!--Ce fichier vérifie que l'utilisateur a bien rentré un bon pseudo et un bon mot de passe pour qu'il puisse se connecter-->
<?php
session_start(); //démarrage de la session pour avoir accès aux variables de session
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
	$req = $bdd->query("SELECT * FROM share "); //Sélectionne toute la base de donnée des utilisateurs
	$connexion = 0; // On initialise deux variables qui validerons le pseudo et le mot de passe
	$connexion_mdp = 0;
	while($donnees = $req ->fetch()) //On parcoure toute la base de donnée
	{
		if($donnees['pseudo'] == $_POST['pseudo']) // Si le pseudo rentré correspond à un pseudo de la base de donnée
		{
			$pseudo = $_POST['pseudo']; //On récupère ce pseudo dans une variable
			$connexion = 1; //On modifie la variable connexion pour savoir que le pseudo est correct
		}
	}
	$req -> closeCursor(); //On termine cette requête
	if($connexion == 1) //Si le pseudo rentré est valide
	{
		$req = $bdd ->query("SELECT * FROM share WHERE pseudo = '$pseudo'"); //On récupère le mot de passe correspondant à se pseudo
		$donnee = $req->fetch();
		if($_POST['mdp'] == $donnee['mdp'] ) //Si le mot de passe rentré par l'utilisateur est valide
		{
			$connexion_mdp = 1;  //On change la variable connexion_mdp pour savoir que le mot de passe est correct
		}
		else
		{
			?>
			<h1>Mot de passe incorrect !</h1><a href="Connexion.php"><br /><br /> Cliquez ici pour revenir à la page de connexion</a>
			 <!--Si le mot de passe est incorrect on affiche un message d'erreur et un lien pour revenir à la page de connexion-->
		<?php
		}
	}
	else
	{
		?>
			<h1>Identifiant incorrect !</h1><a href="Connexion.php"><br /><br /> Cliquez ici pour revenir à la page de connexion</a> 
			<!--Si l'identifiant est incorrect on affiche un message d'erreur et un lien pour revenir à la page de connexion-->
		<?php
	}
	if($connexion_mdp == 1) //Si le pseudo et le mot de passe sont corrects on renseigne les informations de l'utilisateur dans la session
	{
		$_SESSION['pseudo'] = $donnee['pseudo'];
		$_SESSION['id'] = $donnee['id'];
		$_SESSION['prenom'] = $donnee['prenom'];
		$_SESSION['nom'] = $donnee['nom'];
		$_SESSION['interets'] = $donnee['interets'];
		?>
		<h1>Authentification réussie</h1><a href="Accueil.php">Vous êtes authentifié, cliquez ici pour accéder à la page d'accueil</a> <!-- On affiche un message et un lien pour aller sur la page d'accueil-->

	<?php
	}
	$req -> closeCursor();
	?>
</div>
</body>
</html>