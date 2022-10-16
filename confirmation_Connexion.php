<?php
    session_start();
    ini_set('display_errors', 'on');
    try{
    $bdd=new PDO("mysql:host=127.0.0.1;dbname=docker_blog;charset=utf8","root","root");
    }
    catch(exception $e)
   {
       die("erreur".$e->getMessage());
   }


    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email=htmlspecialchars($_POST["email"]);
        $password=htmlspecialchars($_POST["password"]);

        $email = strtolower($email); // email transformé en minuscule


        // prépare la requête pour la variable email
        $check = $bdd->prepare('SELECT id_user, pseudo_User, email, mdp_User, token FROM user WHERE email = ?');
        $check->execute(array($email));
        $data=$check->fetch(); //récupère les données de la base de donnée
        $row=$check->rowCount(); // retourne une valeur si les donnée sont conforme

        if($row==1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) // vérifie si l'email est conforme
            {
                if(password_verify($password, $data['mdp_User'])) // vérifie si le mot de passe saisi est égale à celui de la bdd
                {
                    $_SESSION['user']=$data['pseudo_User'];
                    $_SESSION['user_token']=$data['token'];
                    header('location:accueil_user.php'); 


                }else{
                       header('location:connexion.php?login_err=password');                    
                }

            }else{
                header('location:connexion.php?login_err=email');


            }

        }else{
            header('location:connexion.php?login_err=already');

        }

    }

    else
    {
        header('location:connexion.php');

    }
   


?>