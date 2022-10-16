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

    if(isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"]))
    {
        $pseudo=htmlspecialchars($_POST["pseudo"]);
        $email=htmlspecialchars($_POST["email"]);
        $password=htmlspecialchars($_POST["password"]);

        $email = strtolower($email); // email transformé en minuscule

        $check= $bdd->prepare('SELECT * FROM admin WHERE email_admin = ?');
        $check->execute(array($email));
        $data=$check->fetch();
        $row=$check->rowCount();

        if($row==1)
        {
            if($pseudo==$data['pseudo_Admin'])
            {

           
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if($password==$data['mdp_admin'])
                {
                    $_SESSION['user_admin']=$data['pseudo_Admin'];
                    $_SESSION['user_id_admin']=$data['id_Admin'];
                    header('location:accueil_admin.php'); 


                }else{
                       header('location:connexion.php?login_err=password');                    
                }

            }else{
                header('location:connexion.php?login_err=email');


            }

            }else{
                 header('location:connexion.php?login_err=pseudo');

             }

        }else{
            header('location:connexion.php?login_err=already');

        }

    }

   
   


?>