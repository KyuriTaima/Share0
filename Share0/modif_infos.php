<!--Cette page affiche les informations personnelles de l'utilisateur et lui permet de les modifier via un formulaire qui sera transmis à une page de traitement-->
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
	<title>Modification des informations personnelles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
		<h1>Modification des informations personnelles</h1>
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
		$req = $bdd->query("SELECT * FROM share WHERE pseudo = '$pseudo' "); //On récupère toutes les informations de l'utilisateur
		$donnee = $req->fetch();
			?>
			<!--Pour chaque champ on affiche les données existantes mais l'utilisateur peut les modifier-->
			<form action="traitement_modif_infos.php" method="post">
				<label>Nom :<br /></label><input type="text" name="nom" value="<?php echo $donnee['nom']?>"><br /><br />
				<label>Prénom :<br /></label><input type="text" name="prenom" value="<?php echo $donnee['prenom']?>"><br /><br />
				<label>Email :<br /></label><input type="text" name="email" value="<?php echo $donnee['email']?>"><br /><br />
				<label>Pseudo :<br /></label><input type="text" name="pseudo" value="<?php echo $donnee['pseudo']?>"><br /><br />
				<label>Interets :<br /></label><input type="text" name="interets" value="<?php echo $donnee['interets']?>"><br /><br />
				<label>Mot de passe :<br /></label><input type="text" name="mdp" value="<?php echo $donnee['mdp']?>"><br />
				<br /><input type="submit" name="Enregistrer">
			</form>
		<?php
		$req->closeCursor();
		?>
	</div>

</body>
</html>