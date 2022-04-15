<?php
   session_start();

   $add = $_SERVER['REMOTE_ADDR'] ;

   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue dans votre espace personnel, $add";
   else
      $bienvenue="Bonsoir et bienvenue dans votre espace personnel, $add";
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <style>
         *{
            font-family:arial;
         }
         body{
            margin:20px;
         }
         a{
            color:#DD7700;
            text-decoration:none;
         }
         a:hover{
            text-decoration:underline;
         }
      </style>
   </head>
   <body onLoad="document.fo.login.focus()">
      <h1><?php echo $bienvenue?></h1>
      [ <a href="deconnexion.php">Se déconnecter</a> ]
   </body>
</html>