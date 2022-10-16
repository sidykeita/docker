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
    <!-- controle les erreurs --> 
    <?php 
     if(isset($_GET['login_err'])) 
                { 
                    $err = htmlspecialchars($_GET['login_err']); 
                    switch($err) 
                    { 
                        case 'password': 
                        ?> 
                                Erreur mot de passe incorrect 
                        <?php 
                        break; 
                        case 'email': 
                        ?> 
                              Erreur email incorrect 
                        <?php 
                        break; 
                        case 'pseudo': 
                        ?> 
                              Erreur pseudo incorrect 
                        <?php 
                        break; 
                        case 'already': 
                        ?> 
                              Erreur compte non existant 
                        <?php 
                        break; 
                    } 
                } 
    ?> 

    
     
    <!-- Fin controle des erreurs --> 
    <!-- Formulaire de connexion --> 

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
      
            <form action="confirmation_Connexion_admin.php" method="POST"> 
            <h3>Connectez-vous à votre compte admin</h3> 

                    <label for="pseudo">Pseudo</label> 
                    <input type="text" name="pseudo" class="input-mail" id="pseudo" required> 
                    <br>

                    <label for="email">Adresse email</label> 
                    <input type="email" name="email" class="input-mail" id="email" required> 
                    <br>
                
                    <label for="password">Mot de passe</label> 
                    <input type="password" name="password" class="input-mdp" id="password" required> 
                    <br>
                
                    <input type="submit" value="Connectez-vous" name="envoyer" class="button"> 
                    <br>
                
                    
                
                    

        
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
        
   
    