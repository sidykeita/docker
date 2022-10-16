<?php

session_start();
ini_set('display_errors', 'on');

$bdd=new PDO("mysql:host=127.0.0.1;dbname=docker_blog;charset=utf8","root","root");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>

    <header>
            <h1><a href="index.php">BLOG</a></h1>
        
    </header>

    <nav>
        <ul>
            <li class="nav_color1"><a href="index.php">Accueil</a></li>
            <li class="nav_color2"><a href="inscription.php">Inscription</a></li>
            <li class="nav_color3"><a href="connexion.php">Connexion</a></li>
        </ul>
    </nav>

    <section>

               
            <div id="content">

            <div class="blog">

            <h2>Bienvenue sur mon blog !</h2>
        
                <?php

                $req=$bdd->query('SELECT * FROM billet ORDER BY id_Billet DESC');

                if($req->rowCount()>0)
                {
                     while($donnees=$req->fetch())
                     {
                        echo"<div class=news> <h3>".$donnees["title"]." ".$donnees["date_Billet"]."</h3> <p>".$donnees["content"]."</p></div>";
                        
                    
                     }
                }else{
                 echo'rien trouvé';
                }


                ?>
                </div>
                    
                </div>

            </div>
    </section> 

    <footer>
            Tous droits réservés - Exercice PHP
    </footer>

</body>
</html>