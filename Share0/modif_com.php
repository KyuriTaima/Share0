<!--Cette page affiche le titre et le contenu de l'article qu'on a choisi de modifié et permet à l'utilisateur de modifier ces champs -->
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
	<title>Modification du commentaire</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="modifs.css">
</head>
<body>
	<div class="principal">
		<h1>Modification du contenu d'un article</h1>

		<?php
		//On récupère l'id de l'article à modifier et le pseudo de l'utilisateur
		$id = $_POST['id_article'];
		$pseudo = $_SESSION['pseudo'];
		$_SESSION['id_modif'] = $id; //On stocke l'id de l'article dans une variable de la session
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
		$req = $bdd->query("SELECT * FROM articles WHERE id_article = '$id' "); //On récupère l'article à modifier
		$donnee = $req->fetch();
		if ($pseudo != $donnee['pseudo']) { //On vérifie que le numéro entré par l'utilisateur avec le formulaire de sélection de l'article à modifier correspond bien à un article qu'il a écrit
			echo 'erreur, numéro incorrect';
			?><a href="accueil.php"> Retour à l'accueil</a><?php
		}
		else
		{
			?>
			<!--Le formulaire affiche le titre et le contenu en le préremplissant avec les champs déjà existants -->
			<form action="traitement_modif.php" method="post">
				<label>Nouveau titre :<br /></label><input type="text" name="titre" value="<?php echo $donnee['titre']?>"><br /><br />
				Nouveau contenu :<br />
				<textarea name="contenu" rows="10" cols="50">
					<?php echo $donnee['contenu']; ?>
				</textarea>
				<br /><input type="submit" name="Enregistrer">
			</form>
		<?php
		}
		$req->closeCursor();
		?>
	</div>

</body>
</html>