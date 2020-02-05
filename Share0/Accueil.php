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
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_pageblog.css" /> <!-- lie la page d'accueil avec le fichier de style css-->
        <title>Share0</title>
    </head>

    <body>
    <div id="blocpage"> <!-- div du bloc de la page, facilite la mise en page -->

        <!--Création du header qui se placera tout en haut de la page -->
        <header id="header">
            <div id="header_left">
                <strong>SHARE 0</strong>
            </div>

            <!--liens permettant d'aller dans les sections de recherche et de signalement -->
            <div id="header_right">
                <div class="bouton">
                    <form action='Articles.php' method='POST'>
                        <input type="text" name="recherche" placeholder="Recherche">
                        <input type="submit" name="valider">
                    </form>
                </div>
                <div class="bouton" id="signal">
                    <a href=#>Signaler un contenu choquant</a>
                </div>
            </div>
        </header>

        <!-- Bloc prncipal contenant tout sauf le header et le footer-->
        <div id="bloc_principal">

            <!--Appartés sur les côtés qui permettent d'afficher quelques informations personnelles de l'utilisateur -->
            <div id="asides">
                <aside>
                    <div id="aside1">
                        <div class="titre_aside"><h2><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></h2></div> <!-- Affiche les prenoms et noms de l'utilisateur-->
                        <div class="image_aside"><img src="images/profil.jpg" alt="profil"></div> <!-- Affiche la photo de profil-->
                        <div id="infos">
                            <ul>
                                <li><strong>Centres d'intérêts : </strong><?php echo $_SESSION['interets']; ?></li> <!-- Affiche les centres d'interêts de l'utilisateur-->
                            </ul>
                        </div>
                    </div>
                </aside>

                <!-- Affichage de deux images dans un aside différent-->
            <aside>
                    <h1>Mes Photos</h1>
                    <div id="photos">
                        <div class="image_aside"><img src="images/S.jpg" alt="the S"></div>
                        <div class="image_aside"><img src="images/profil.jpg" alt="profil"></div>
                    </div>
                
            </aside>
        </div>
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


        $req = $bdd->query("SELECT * FROM articles ORDER BY id_article DESC LIMIT 2"); //on selectionne toutes les informations sur les deux derniers articles postés
        $donnee = $req->fetch(); //On prend le premier article
        ?>
        <div id="articles">

                <!--A chaque information (titre, auteur...) on récupère l'information correspondante dans les informations de l'article que l'on vient de récupérer de la base de donnée -->
                <article class="classe_article">
                    <div class="titre_article"><h2><?php echo $donnee['titre']; ?></h2></div>
                    <div class="infos_auteur"><strong><?php echo $donnee['pseudo']; ?></strong><br />Mis en ligne le <?php echo $donnee['date']; ?></div>
                    <div class="images_articles"><img src="images/chat.jpg" alt="chat"></div> <!--On affiche une image avec l'article mais elle n'a rien avoir avec le contenu de l'article... -->
                    <div class="texte_article"><p><?php echo $donnee['contenu']; ?></p>
                </div>

                    
                </article>

                <article class="classe_article">
                    <?php $donnee = $req ->fetch(); ?> <!-- On récupère le deuxième article-->
                    <div class="titre_article"><h2><?php echo $donnee['titre']; ?></h2></div>
                    <div class="infos_auteur"><strong><?php echo $donnee['pseudo']; ?></strong><br />Mis en ligne le <?php echo $donnee['date']; ?></div>
                    <div class="images_articles"><img src="images/cochon.jpg" alt="cochon"></div>
                    <div class="texte_article"><p><?php echo $donnee['contenu']; ?></p>
                </div>

                    
                </article>
        </div>
            <?php $req -> closeCursor(); ?> <!--On ferme le curseur pour libérer la requête-->
        </div>

        <footer>
            <div class="bouton">
                <a href="#">Contact</a> <!--Bouton permettant d'accéder à la page de contact des administrateurs du site (non fonctionnel)-->
            </div>

            <div class="bouton">
                <a href="#">Articles récement aimés par <?php echo $_SESSION['prenom'] ?></a> <!--Bouton permettant d'accéder à la page des articles récemment aimés par l'utilisateur (non fonctionnel)-->
            </div>

            <!--Menu de navigation permettant d'accéder à l'acceuil, au profil de l'utilisateur et à la déconnexion -->
            <nav>
                <ul id="menu">
                    <li class="bouton"><a href="Accueil.php">Accueil</a></li>
                    <li class="bouton"><a href="ma_page.php">Profil</a></li>
                    <li class="bouton"><a href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </nav>
        </footer>
        </div>
    </body>
</html>
