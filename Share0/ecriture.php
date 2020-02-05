<?php
session_start(); //démarrage de la session pour avoir accès aux variables de session
if(isset($_SESSION['pseudo']) == FALSE)
{
    header('Location: http://localhost/Share0/Connexion.php');
    exit();
}
?>
<!--Cette page permet à l'utilisateur d'écrire un nouvel article-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ecriture</title>
        <link rel="stylesheet" type="text/css" href="modifs.css">
    </head>
        
    <body>
        <div class="principal">
        <h1>Ecriture de l'article</h1>
        <!--Formulaire qui permet à l'utilisateur de rentrer le titre et le contenu du texte-->
            <form action="traitement_ecriture.php" method="post">
        <p>
                Renseignez ces informations :<br /><br />
                <label>Titre de l'article :<br /></label><input type="text" name="titre" /><br /><br />
                <label>Contenu de l'article :<br /></label><textarea rows = "10" cols = "50" name="contenu"></textarea><br />
                <input type="submit" value="Poster l'article" />
        </p>
            </form>
        <a href="Accueil.php">Retour à l'accueil</a>
    </div>
    </body>
</html>