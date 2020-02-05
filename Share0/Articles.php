<?php
session_start(); //démarrage de la session pour avoir accès aux variables de session
if(isset($_SESSION['pseudo']) == FALSE)
{
    header('Location: http://localhost/Share0/Connexion.php');
    exit();
}

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
    $existence = 0;
    $pseudo = $_POST['recherche'];
    $req = $bdd->query("SELECT pseudo FROM share"); // On récupère de la base de donnée seulement les articles publiés par l'utilisateur
    while ($donnee = $req->fetch()) {
      	if($donnee['pseudo'] == $_POST['recherche']){
      		$existence = 1;
      	}
      }
      if($existence == 0)
      {
    	header('Location: http://localhost/Share0/Accueil.php');
    	exit();      	
      }
      else 
      {
      	$req2 = $bdd->query("SELECT * FROM share WHERE pseudo = '$pseudo' ");
      	$donnee2 = $req2->fetch();
      }  
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_pageblog.css" />
        <title>Articles_utilisateur</title>
    </head>

    <body>
    <div id="blocpage">
        <header id="header">
            <div id="header_left"><strong>SHARE 0</strong></div>

            <div id="header_right">
                <div class="bouton">
                    <form action='Articles.php' method='POST'>
                        <input type="text" name="recherche" placeholder="Recherche">
                        <input type="submit" name="valider">
                    </form>
                </div>
                <div class="bouton"><a href="modifier_ma_page.php">Modifier ma page</a></div> <!--Bouton qui emmène vers la modification de la page-->
                <div class="bouton" id="signal"><a href=#>Signaler un contenu choquant</a></div>
            </div>
        </header>
        <div id="bloc_principal">
        <div id="asides">
        <aside>
            <div id="aside1">
                <div class="titre_aside"><h2><?php echo $donnee2['prenom'] . ' ' . $donnee2['nom']; ?></h2></div>
                <div class="image_aside"><img src="images/profil.jpg" alt="profil"></div>
                <div id="infos">
                    <ul>
                        <li><strong>Centres d'intérêts :</strong><?php echo $donnee2['interets']; ?></li>
                    </ul>
                </div>
            </div>
        </aside>

        <aside>
                <h1>Mes Photos</h1>
                <div id="photos">
                    <div class="image_aside"><img src="images/S.jpg" alt="the S"></div>
                    <div class="image_aside"><img src="images/profil.jpg" alt="profil"></div>
                </div>
            
        </aside>
    </div>
    <div id="articles">
    <?php
    $req3 = $bdd->query("SELECT * FROM articles WHERE pseudo = '$pseudo' ");
    while ($donnee3 = $req3->fetch()) { //Tant qu'il y a des articles à afficher on les affiche
    ?>
            <article class="classe_article">
                <div class="titre_article"><h2><?php echo $donnee3['titre']; ?></h2></div>
                <div class="infos_auteur"><strong><?php echo $donnee3['pseudo']; ?></strong><br />Mis en ligne le <?php echo $donnee3['date']; ?></div>
                <div class="images_articles"><img src="images/chat.jpg" alt="chat"></div>
                <div class="texte_article"><p><?php echo $donnee3['contenu']; ?></p></div>           
            </article>
            <?php
        }
        ?>
    </div>
    <?php $req3 -> closeCursor(); ?> <!--On ferme la requête -->
</div>

        <footer>
            <div class="bouton">
                <a href="#">Contact</a>
            </div>

            <div class="bouton">
                <a href="#">Articles récement aimés par Sulwen</a>
            </div>

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