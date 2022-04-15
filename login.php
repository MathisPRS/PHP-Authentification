<?php
   session_start();

   @$username=$_POST["login"];
   @$password=$_POST["pass"];
   @$valider=$_POST["valider"];
   $erreur="";
   
   //Config LDAP
   $serveur_ldap = 'ldap://192.168.2.118';
   $port_ldap = 389;
   $domaine = '@chatelet.local';
   $ldap_conn = ldap_connect($serveur_ldap,$port_ldap) or $erreur="Connexion impossible au LDAP"; ;
   

   if(isset($_POST["valider"])){
      $ldap_bind = ldap_bind($ldap_conn, $username.$domaine, $password);
      if($ldap_bind){
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else{
         $erreur="Mauvais login ou mot de passe!";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <link rel="stylesheet" type="text/css" href="css/util.css">

</head>

<body>
   <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" name="fo" method="post" action="">  
                <span class="login100-form-title p-b-51">
						MSPR EPSI
                </span>
                <div class="erreur"><?php echo $erreur ?></div>
                
                <div class="wrap-input100 validate-input m-b-16">
                    <input class ="input100" type="text" name="login" placeholder="Nom d'utilisateur" />
					<span class="focus-input100"></span>
                </div>

			    <div class="wrap-input100 validate-input m-b-16">
                    <input class ="input100" type="password" name="pass" placeholder="Mot de passe" />
					
			    </div>
			    <div class="container-login100-form-btn m-t-17">
   				    <input class="login100-form-btn" type="submit" name="valider" value="S'authentifier" />
			    </div>
				</form>
			</div>
		</div>
    </div>
</body>
</html>