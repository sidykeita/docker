<?php
session_start();
ini_set('display_errors', 'on');

$bdd=new PDO("mysql:host=127.0.0.1;dbname=docker_blog;charset=utf8","root","root");
if(!isset($_SESSION['user_admin']) && !isset($_SESSION['user_id_admin']))
    {
        header('location:connexion_admin.php');
    }       		

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

            <body>

	<center> <h3> Bonjour <?php echo $_SESSION['user_admin'] ?> </h3></center>

    <h4><center> Que désirez vous faire ? </center></h4>
  
    <a href='gestion_commentaire.php'>gérer les commentaires</a>    
    <a href='gestion_user.php'>gérer les utilisateurs</a> 
    <a href='deconnexion.php'>Déconnexion</a>    
</body>


                
                </div>
                    
                </div>

            </div>
    </section> 

    <footer>
            Tous droits réservés - Exercice PHP
    </footer>

</body>
</html>