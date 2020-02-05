<!--Cette page offre plusieurs options à l'utilisateur: ecrire un nouvel article, Modifier un article, Supprimer un article ou modifier ses informations personnelles-->
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
    <title>Modifier ma page</title>
    <link rel="stylesheet" type="text/css" href="modifs.css">
    <meta charset="utf-8">
</head>
<body>
    <div class = "principal">
        <!--Chaque lien emmène l'utilisateur sur une autre page qui lui permet d'effectuer une procédure-->
    	<h1>Modifier ma page</h1>
        <div id = "ecriture"><p><a href="ecriture.php">Ecrire un nouvel article</a></p></div>
        <div id = "modif"><p><a href="modif.php">Modifier un article</a></p></div>
        <div id = "supprimer"><p><a href="supprimer.php">Supprimer un article</a></p></div>
        <div id = "modif_infos"><p><a href="modif_infos.php">Modifier vos informations personnelles</a></p></div>
    </div>

</body>
</html>