<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion Share0</title>
        <link rel="stylesheet" type="text/css" href="modifs.css"> <!--Lie cette page html avec la feuille de style en CSS -->
    </head>
        
    <body>
        <div class="principal"> <!--Bloc principal de la page -->
        <p>
            <h1>Bienvenue sur Share0</h1>

            <!--Formulaire permettant à l'utilisateur de rentrer un pseudo et un mot de passe, le formulaire envoie les données rentrées au fichier de traitement -->
            <form action="traitement_connexion.php" method="post">
                Authentifiez vous :<br /><br />
                <label>Pseudo :<br /></label><input type="text" name="pseudo" /><br /><br />
                <label>Mot de passe :<br/></label><input type="password" name="mdp" /><br /><br />
                <input type="submit" value="Connexion" /><br /> <!--Bouton de soumission du formulaire -->
            </form>
            <a href="Inscription.php">Inscrivez vous ici !</a> <!--Lien vers la page d'inscription -->
        </p>
        </div>
    </body>
</html>