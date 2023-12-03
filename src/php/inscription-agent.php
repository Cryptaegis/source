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
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
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
if(isset($firstname) && isset($lastname) && isset($bday) && isset($phone) && isset($email) && isset($mdp1) && isset($mdp2) && isset($_POST['specialite']) && $firstname != "" && $lastname != "" && $bday !="" && $phone != ""  && $email != "" && $mdp1 != "" && $mdp2 !="" && $specialite != "" ){
        //verifions que les mots de passes sont conforme

        if ($mdp2 != $mdp1) {
            // s'ils sont differrent
            $error = "Les mots de passes sont différents !";
        }else{
                    //verifions si l'agent existe dans la table agent  
                $sql0 = "SELECT * FROM specialite WHERE name_spe = '$specialite'";
                $sql = "SELECT * FROM agent WHERE  lastname_a='$lastname' AND firstname_a='$firstname' AND birthdate ='$bday' AND telephone ='$phone' AND email='$email' AND  password='$mdp1' AND name_spe = '$specialite'";
                $result = $pdo->query($sql0);
                $result = $pdo->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                if($row){
                    //si ça existe
                    $error = "Cet utilisateur existe déjà !";
                }else{
                    //inserons les infos dans la table specialite and agent 
                    $sql0 = "INSERT INTO specialite (name_spe) VALUES (:name_spe)";
                    $sql = "INSERT INTO agent (lastname_a, firstname_a, birthdate, telephone, email, password, name_spe) VALUES (:lastname_a, :firstname_a, :birthdate, :telephone, :email, :password, :name_spe)";
                    $stmt = $pdo->prepare($sql0);
                    $stmt->bindParam(":name_spe",$specialite);
                    $stmt->execute();
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":lastname_a",$lastname);
                    $stmt->bindParam(":firstname_a",$firstname);
                    $stmt->bindParam(":birthdate",$bday);
                    $stmt->bindParam(":telephone",$phone);
                    $stmt->bindParam(":email",$email);
                    $stmt->bindParam(":password",$mdp1);
                    $stmt->bindParam(":name_spe",$specialite);
                    $stmt->execute();
                    $stmt->closeCursor();
                    if($stmt){
                        //connexion à la page d'accueil
                    header("Location: index.php");    
                        //si le compte a été créer , créons une variable pour afficher un message dans la page de
                        //connexion
                        $_SESSION['message'] = "Compte crée avec succés.";
                        
                    }
                    
                }
            }
        }else{
                    $error ="Veuillez remplir tous les champs!";
    }

    ?>


    <form action="" method="POST" class="form_connexion_inscription">
    <h1>INSCRIPTION</h1>
    <p class="message_error">
        <?php
        if(isset($error)){
            echo($error);
        }
        ?>
       
    </p>
    <label for="firstname">Prénom:</label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname">Nom:</label>
    <input type="text" name="lastname" id="lastname">
    <label>
    Veuillez saisir votre date de naissance :
    <input type="date" name="bday" />
  </label>
  <label for="phone">Téléphone:</label>
    <input type="text" name="phone" id="phone">
    <label>Adresse Mail</label>
    <input type="email" name="email">
    <label>Mots de passe</label>
    <input type="password" name="mdp1" class="mdp1">
    <label>Confirmation Mots de passe</label>
    <input type="password" name="mdp2" class="mdp2">
    <fieldset>
  <legend>What is your power:</legend>
    <input type="text" id="power" name="specialite" />
    <label for="specialite" name="specialite">Write here:</label>

 
  </fieldset>
    <input type="submit" value="Inscription" name="button_inscription">
    <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
</form>
 <!-- Relié notre page a notre fichier javascript -->
 <script src="../JS/index.js"></script>

</body>

</html>