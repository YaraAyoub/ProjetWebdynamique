<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="logo.jpg" rel="icon" type="images/x-icon" />
     <script type="text/javascript" src="parcours.js"></script>
     <meta charset="utf-8" />
  </head>


<div class="login-popup">
  <div class="form-popup" id="popupFormCo" onclick="closeFormCo()"></div>

  <form method="post" class="form-container-connexion" id="popupCo">


    <button type="button" class="btn cancel" onclick="closeFormCo()">X</button>

    <h2 style="margin-top: 50px;margin-bottom: 25px;">
      J'ai déjà un compte OMNES Santé
    </h2>

    <input type="email" id="email" placeholder="Adresse email" name="email" required
      style="margin-bottom: 20px;
        padding-right: 64px;
        padding-top: 8px;
        padding-bottom: 8px;
        font-size: 15px;"
    >

    <input type="password" id="psw" placeholder="Mot de passe" name="psw" required
      style="margin-bottom: 20px;
        padding-right: 64px;
        padding-top: 8px;
        padding-bottom: 8px;
        font-size: 15px;"
    >

    <p id="noconnexion" style = "display: none; color: red;">email ou mdp incorrect</p>

    <button type="submit" name= "connexion" class="btn co">Connexion</button>

    <?php
    //saisir les données du formulaire
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $psw = isset($_POST["psw"])? $_POST["psw"] : "";

    //identifier BDD
    $database = "omnessante";
    //connectez-vous dans BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // si le bouton Connexion est cliqué
    if (isset($_POST["connexion"])){
      if ($db_found) {

        $sql1 = "SELECT Email
        FROM client
        WHERE Email='$email' AND MdP='$psw'";

        $sql2 = "SELECT Email
        FROM admin
        WHERE Email='$email' AND MdP='$psw'";

        $sql3 = "SELECT Email
        FROM medecin
        WHERE Email='$email' AND MdP='$psw'";

        $result1 = mysqli_query($db_handle, $sql1);
        $result2 = mysqli_query($db_handle, $sql2);
        $result3 = mysqli_query($db_handle, $sql3);

      session_start();
      $_SESSION["email"] = "";
      if (mysqli_fetch_assoc($result1)) {  //client

         $_SESSION["email"] = $email;
         header("Location: index.php");
       }
       else if(mysqli_fetch_assoc($result2))    //admin
       {
         $_SESSION["email"] = $email;
          header("Location: admin.php");
       }
       else if(mysqli_fetch_assoc($result3))    //medecin
       {
          $_SESSION["email"] = $email;
          header("Location: medecin.php");
       }
       else {
            echo("<script>noConnexion()</script>");
            echo("<script>openFormCo()</script>");
        }
      }
    }
     ?>



    <h2 style="margin-top: 23px;font-size: 0.9em;">
      Nouveau sur OMNES Santé ?
    </h2>

    <a href="inscription.php"><button type="button" class="btn insc" onclick="closeFormCo">S'inscrire</button></a>

  </form>
</div>

</html>
