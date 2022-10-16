<?php 
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
        <li class="nav_color2"><a href="index.php">Inscription</a></li>
        <li class="nav_color3"><a href="connexion.php">Connexion</a></li>
    </ul>
</nav>

<section>
    
        <div id="content">

        <?php
    // retourne les erreur
      if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);
                    switch($err)
                    {
                        case 'success':
                        ?>
                           Succès inscription réussie !
                            
                        <?php
                        break;
                        case 'password':
                        ?>
                           
                                Erreur mot de passe différent
                           
                        <?php
                        break;
                        case 'email':
                        ?>
                      
                              Erreur email non valide
                          
                        <?php
                        break;
                        case 'email_length':
                        ?>
                           
                                Erreur email trop long
                          
                        <?php 
                        break;
                        case 'pseudo_length':
                        ?>
                            
                               Erreur pseudo trop long
                          
                        <?php 
                        case 'already':
                        ?>
                            
                                Erreur compte deja existant
                            
                        <?php 
                    }
                }
    ?>
      
             <!-- Formulaire d'inscription -->
    <form action="confirmation_inscription.php" method="POST">
      <p>  <h3> Inscrivez vous : </h3> </p> <br>
        <p> <input type="text" name="pseudo" placeholder="pseudo" required></label></p>
        <p> <input type="email" name="email" placeholder="mail" required ></label></p>
        <p> <input type="password" name="password" placeholder="mot de passe" required autocomplete="of"></label></p>
         <p> <input type="password" name="re-password" placeholder="répétez le mot de passe" required autocomplete="of"></label></p>
        <button type="submit" name="envoyer"> Inscription </button> <br>
        <a href="Connexion.php">Connexion</a>
    </form>  
    
        </div> 
    </main> 
            
                
            </div>

        </div>
</section> 

<footer>
        Tous droits réservés - Exercice PHP
</footer>

</body>
</html>
        