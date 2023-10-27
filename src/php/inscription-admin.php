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
    <title>Connexion Opérateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    //se connecter a la base de donnée depuis le dodument connect.php
    require('connect.php');
    // creer une variable pdo pour utiliser la base de donnée
    $pdo = new PDO ('mysql:host=localhost; dbname=agent_s', $user, $pass);
    global $pdo;
    //extraire les infos du formulaire
    extract($_POST);
    //verifions si les champs sont vides
    if(isset($firstname) && isset($lastname) && isset($email) && isset($mdp1) && isset($mdp2) && $firstname != "" && $lastname != "" && $email != "" && $mdp1 != "" && $mdp2 !=""){
        //verifions que les mots de passes sont conforme
        if ($mdp2 != $mdp1) {
            // s'ils sont differrent
            $error = "Les mots de passes sont différents !";
        }else{ //si non , verifions si le fisrtname, le lastname, l'email existe dans la base de donnée de la table administrateur
                $sql = "SELECT * FROM administrateur WHERE firstname='$firstname' AND lastname='$lastname' AND email='$email'  AND password='$mdp1'";

                $result = $pdo->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                if($row){
                    //si ça existe
                    $error = "Cet utilisateur existe déjà !";
                }else{
                    $sql = "INSERT INTO administrateur (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email','$mdp1')";
                    $pdo->exec($sql);
                    // si le compte a été créer , créons une variable pour afficher un message dans la page de
                    //connexion
                    $_SESSION['message'] = "<p class='message_inscription'>Votre compte a été créer avec succès !</p>";
                    $_SESSION['message'] = "Compte crée avec succés.";
                    //redirection vers la page de connexion
                    header("Location: index.php");
                }  
            }}else{
                $error ="Veuillez remplir tous les champs!";
              }


    ?>


    <form action="" method="POST" class="form_connexion_inscription">
    <h1>Inscription Opérateur</h1>
    <p class="message_error">
        <?php
        if(isset($error)){
            echo($error);
        }
        ?>
       
    </p>
    <label for="name">Nom:</label>
    <input type="text" name="firstname" id="firstname">
    <label for="name">Prénom:</label>
    <input type="text" name="lastname" id="lastname">
    <label>Adresse Mail</label>
    <input type="email" name="email">
    <label>Mots de passe</label>    
    <input type="password" name="mdp1" class="mdp1">
    <label>Confirmation Mots de passe</label>
    <input type="password" name="mdp2" class="mdp2">
    <input type="submit" value="Inscription" name="button_inscription">
    <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
</form>

 <!-- Relié notre page a notre fichier javascript -->
 <script src="script.js"></script>
</body>

</html>