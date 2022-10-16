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


    if(isset($_POST["pseudo"]) AND isset($_POST["email"])  AND isset($_POST["password"])  AND isset($_POST["re-password"]))
    {
    	 $pseudo=htmlspecialchars($_POST["pseudo"]);
    	 $email=htmlspecialchars($_POST["email"]);
    	 $mdp_User=htmlspecialchars($_POST["password"]);
         $re_password=htmlspecialchars($_POST["re-password"]);

        $check=$bdd->prepare('SELECT pseudo_User, email, mdp_User FROM user WHERE email=?');
        $check->execute(array($email));
        $data=$check->fetch();
        $row=$check->rowCount();

        if($row == 0)
        {	
        	if(strlen($pseudo) <= 100)
        	{
        		if(strlen($email)<=100)
        		{
        			if(filter_var($email, FILTER_VALIDATE_EMAIL))
        			{
        				if($mdp_User === $re_password)
        				{
        					$cost = ['cost' => 12]; // le mot de passe doit au moins avoir 12 caractères
                            $mdp_User = password_hash($mdp_User, PASSWORD_BCRYPT, $cost); // crypte le mot de passe
        				

        					// Insert les données dans la base de données
        					$insert = $bdd->prepare('INSERT INTO user(pseudo_User, email, mdp_User ,token ) VALUES(:pseudo, :email, :mdp_User,:token)');
        					$insert->execute(array(
        						'pseudo'=>$pseudo,
        						'email'=>$email,
        						'mdp_User'=>$mdp_User,
        
        						'token' => bin2hex(openssl_random_pseudo_bytes(64))
        					));

        					header('location:inscription.php?reg_err=success');

        				}else{
        					header('location:inscription.php?reg_err=password');
        				}

        			}else{
        				header('location:inscription.php?reg_err=email');
        			}

        		}else{
        			header('location:inscription.php?reg_err=email_length');
        		}	
        	}else{
        		header('location:inscription.php?reg_err=pseudo_length');
        	}

        }else{
        	header('location:inscription.php?reg_err=already');

        }
    }

?>    	