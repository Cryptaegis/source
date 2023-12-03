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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
//connexion Administrateur
if(isset($_POST['button_con'])){
    //si le formulaire est envoyé
    //se connecter à la base de donnée
    require('connect.php');
    $admin = new PDO ('mysql:host=localhost; dbname=agent_s', $user, $pass);
    
       //verifier si les champs sont vides

       global $admin;
    //extraire les infos du formulaire
    extract($_POST);
    //verifions si les champs sont vides
   if(isset($email) && isset($mdp1) && $email != "" && $mdp1 != ""){
    //verifions si les identifiants sont justes
    $req = $admin->prepare("SELECT * FROM administrateur WHERE email = ? AND password =? ");
    $req->execute(array($email, $mdp1));
    $result = $req->fetch();
    $raw_password = $mdp1;
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

            //store the variable 
            if(!password_verify($raw_password, $hashed_password)){
                $error='wrong password';

            }else{
                //Création d'une session qui contient l'email
                $_SESSION['user'] = $email ;
                if(isset ($_POST['button_con']) && "value = 'admin'"){
                    header("location:accueil_op.php");
                }else{
                    echo("ton truc il marche pas ma grande!");
                }
        }             
            }
    }
?>
 <script src="../JS/index.js"></script>

       </body>
</html>