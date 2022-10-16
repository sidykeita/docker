<?php
    session_start();

    ini_set('display_errors', 'on');

$bdd=new PDO("mysql:host=127.0.0.1;dbname=docker_blog;charset=utf8","root","root");
if(!isset($_SESSION['user_admin']) && !isset($_SESSION['user_id_admin']))
    {
        header('location:connexion_admin.php');
    }       		

    if(!isset($_SESSION['user_admin']) && !isset($_SESSION['user_id_admin']))
    {
        header('location:connexion.php');

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
    

    <?php

    echo '<h3> Supprimer un utilisateur </h3>';

     $req=$bdd->query('SELECT * FROM user ORDER BY id_user ');

     while($donnees_fiche=$req->fetch())
        {
            echo '<p>'.$donnees_fiche['pseudo_User'].' '.$donnees_fiche['email'].' '.'<a href="traitement_suppression_utilisateur.php?id='.$donnees_fiche["id_user"].'">supprimer</a>';
                 
        }

    ?>

    </br>
    <a href='gestion_fiche.php'>gérer les fiches</a>  
    <a href='gestion_admin.php'>gérer les administrateurs</a>  
    <a href='deconnexion.php'>Déconnexion</a>    
</body>

</html>