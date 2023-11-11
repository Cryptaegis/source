
<?php 
  //démarer la session
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion Compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    //connexion Administrateur
    if(isset($_POST['button_con'])){
        //si le formulaire est envoyé
        //se connecter à la base de donnée
        require('connect.php');
        $admin = new PDO ('mysql:host=localhost; dbname=agent_s', $user, $pass);
        global $admin;
        //extraire les infos du formulaire
        extract($_POST);
        //verifions si les champs sont vides
       if(isset($email) && isset($mdp1) && isset($type) && $email != "" && $mdp1 != "" && 
       $type != ""){
        //si type=operateur
        if( $type == "OPERATEUR"){
        $req = $admin->prepare("SELECT * FROM administrateur WHERE email = ? AND password = ?");
        $req->execute(array($email,$mdp1));
        //vérification des mots de passe et emails
        $resultat = $req->fetchAll();
        //si l'utilisateur existe dans la bdd
                if($resultat ){
                    //
                //Création d'une session qui contient l'email
                $_SESSION['user'] = $email ;
                //redirection vers la page d'accueil
                header('location:accueil_op.php');
            }else{
                $error = 'Identifiant ou mot de passe incorrect';
            }

        }else{
            if($type == "AGENT"){
                $req = $admin->prepare("SELECT * FROM agent WHERE email = ? AND password = ?");
                $req->execute(array($email,$mdp1));
                //vérification des mots de passe et emails
                $resultat = $req->fetchAll();
                //si l'utilisateur existe dans la bdd
                        if($resultat ){
                            //
                        //Création d'une session qui contient l'email
                        $_SESSION['user'] = $email ;
                        //redirection vers la page d'accueil
                        header('location:accueil_agent.php');
                    }else{
                        $error = 'Identifiant ou mot de passe incorrect';
                    }
            }
        }
    }}
       
            
    ?>

    
    <form action=""  method="POST" class="form_connexion_inscription">
        <h1>CONNEXION</h1>
        <?php
           //affichons le message qui dit qu'un compte a été créer
           if(isset($_SESSION['message'])){
               echo $_SESSION['message'] ;
               unset($_SESSION['message']) ;
           }
        ?>
        <p class="message_error">
            <?php 
               //affichons l'erreur
               if(isset($error)){
                   echo $error ;
                   unset($error);
               }
            ?>
        </p>
        <label>Adresse Mail</label>

        <input type="email" name="email">
        <label>Mots de passe</label>
        <input type="password" name="mdp1">
        <label>Vous êtes ?</label>
        <select name="type" id="type">
            <option value="OPERATEUR">Opérateur</option>
            <option value="AGENT">Agent</option>
        </select>

        <input type="submit" value="Connexion" name="button_con">
        <p class="link">Vous n'avez pas de compte ? <a href="inscription-admin.php">Opérateur</a> ou <a href="inscription-agent.php">Agent</a></p>
    </form>
    
</body>
</html>