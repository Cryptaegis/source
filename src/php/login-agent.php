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
         //connexion Agent
         if(isset($_POST['button_con'])){
            //si le formulaire est envoyé
            //se connecter à la base de donnée
            require('connect.php');
            $pdo = new PDO ('mysql:host=localhost; dbname=agent_s', $user, $pass);
               //verifier si les champs sont vides
               global $pdo;
            //extraire les infos du formulaire
 
            extract($_POST);
            //verifions si les champs sont vides
            if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != ""){
                //verifions si les identifiants sont justes et le mots de passe 
                $req=$pdo->prepare("SELECT * FROM agent WHERE email=? AND password=?");
                 $req->execute(array($email, $mdp1));
                 $result = $req->fetch();
                 $raw_password = $mdp1;
         $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
 
                 //store the variable 
                 if(!password_verify($raw_password, $hashed_password)){
 
                     $error='wrong password!';
 
                    }else{
                        //Création d'une session qui contient l'email
                        $_SESSION['user'] = $email ; 
                        if(isset ($_POST['button_con']) && "value = 'agent'"){
                            header("location:accueil_agent.php");
                        }
                }             
                }
                            
       };

?>
       </body>
</html>