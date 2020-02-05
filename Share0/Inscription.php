<!--Cette page permet à l'utilisateur de renseigner ses informations personnelles pour son inscription-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil_Share0</title>
        <link rel="stylesheet" type="text/css" href="modifs.css">
    </head>
        
    <body id="inscription">
        <div class ="principal">
            <h1>Inscription</h1>
        <form action="traitement_inscription" method="post">
            <label>Nom :<br /></label><input type="text" name="nom"><br /><br />
            <label>Prénom :<br /></label><input type="text" name="prenom"><br /><br />
            <label>Email :<br /></label><input type="text" name="email"><br /><br />
            <label>Pseudo :<br /></label><input type="text" name="pseudo"><br /><br />
            <label>Mot de passe :<br /></label><input type="text" name="mdp"><br /><br />
            <label>Interets :<br /></label><input type="text" name="interets"><br /><br />
            <input type="submit" value="Inscription" /><br />
        </form>
    </div>
</body>
</html>