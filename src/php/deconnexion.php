<?php 
  //démarer la session
  session_start();
  if(!isset($_SESSION['user'])){
      // si l'utilisateur n'est pas connecté
     // redirection vers la page de connexion
     header("location:src\php\index.php");
  }
  //destruction de toute les sessions
   session_destroy();
   // redirection vers la page de connexion
   header("Location:src\php\index.php");
?>