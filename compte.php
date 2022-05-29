<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link href="index.css" rel="stylesheet" type="text/css" />
      <link href="compte.css" rel="stylesheet" type="text/css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="logo.jpg" rel="icon" type="images/x-icon" />
      <script type="text/javascript" src="parcours.js"></script>
     <meta charset="utf-8" />
  </head>

  <body>

    <div id="logo">
      <img src="logo4.png" alt="OMNES SANTE" width="310" height="80" />
    </div>

    <div id="wrapper">

      <div id="header">

        <div class="btn-group">
          <a href="compte.php"><button class="button">Votre compte</button></a>
          <a href="rdv.php"><button class="button">RDV</button></a>
          <a href="recherche.php"><button class="button">Recherche</button></a>
          <a href="parcourir.php"><button class="button">Tout Parcourir</button></a>
          <a href="index.php"><button class="button">Accueil</button></a>

        </div>
      </div>


      <div id="section">

        <div id="section2">

          <h2 style="margin-top: 50px;margin-bottom: 25px;text-align: center;">
              <i class="fa fa-user"></i> Vos informations personnelles:
          </h2>

          <img src="imagesDeco/compte.jpg" alt="OMNES SANTE" width="200" height="220" style="position:absolute;top:120px; left: 70px"/>


          <?php

            $mail = $_SESSION['email'];

            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT c.Image, c.Nom, c.Prenom, c.MdP, c.Email, c.CarteVital, c.DateNaissance, c.Adresse1, c.Adresse2, c.CodePostal, c.Pays, p.Type, p.Numero, p.DateExpiration, p.CodeSecurite
              FROM client c, payment p
              WHERE email='$mail'
              AND c.IdClient=p.IdClient";

              $result = mysqli_query($db_handle, $sql);

              while ($data = mysqli_fetch_assoc($result)) {

                $photoProfil=$data['Image'];
                $prenom = $data['Prenom'];
                $nom = strtoupper($data['Nom']);
                $mdp = $data['MdP'];
                $email = $data['Email'];
                $carteVital = $data['CarteVital'];
                $dateNaissance = $data['DateNaissance'];
                $adresse1 = $data['Adresse1'];
                $adresse2 = $data['Adresse2'];
                $codePostal = $data['CodePostal'];
                $pays = $data['Pays'];
                $type = $data['Type'];
                $numero = $data['Numero'];
                $dateExpiration = $data['DateExpiration'];
                $codeSecurite = $data['CodeSecurite'];

                echo ("<img src=\"PhotoProfils/$photoProfil\" height='120' width='100' style=\"float:right;\">");

                echo ("<p style=\"margin-bottom: 20px;padding-top: 8px;padding-bottom: 8px;\">"
                  ."Prénom : ".$prenom."<br>"."<br>"
                  ."Nom : ".$nom."<br>"."<br>"
                  ."<i class=\"material-icons\">"."&#xe7e9;"."</i>"." Date de naissance : ".$dateNaissance."</p>");


                echo("<p style=\"margin-bottom: 20px;padding-right: 64px;padding-top: 8px;padding-bottom: 8px;\">"
                  ."<i style=\"font-size:24px\" class=\"fa\">&#xf0fe;"."</i>"." Carte Vital : ".$carteVital."<br>"."<br>"
                  ."<i class=\"material-icons\">"."&#xe55f;"."</i>"." Adresse : ".$adresse1." ".$adresse2.", ".$codePostal.", ".$pays."<br>"."<br>"
                  ."<h4> Information de connexion : <br>"."</h4>"
                  ."Email : ".$email."<br>"."<br>"
                  ."Mot de passe : "."<input type=\"password\" value=\"$mdp\" id=\"mdpSecret\">"
                  ."<input type=\"checkbox\" onclick=\"showSecretData('mdpSecret')\">"."<i class=\"fa fa-low-vision\">"."</i>"."</p>");


                echo("<p style=\"margin-bottom: 20px;padding-right: 64px;padding-top: 8px;padding-bottom: 8px;\">"
                  ."<h4> Information de paiement "."<i class=\"fa fa-credit-card\">"."</i>"." : <br>"."</h4>"
                  ."Type : "."<input type=\"password\" value=\"$type\" id=\"typeCarteSecret\">"
                  ."<input type=\"checkbox\" onclick=\"showSecretData('typeCarteSecret')\">"."<i class=\"fa fa-low-vision\">"."</i>"."<br>"."<br>"
                  ."Numéro de la carte : "."<input type=\"password\" value=\"$numero\" id=\"numCarteSecret\">"
                  ."<input type=\"checkbox\" onclick=\"showSecretData('numCarteSecret')\">"."<i class=\"fa fa-low-vision\">"."</i>"."<br>"."<br>"
                  ."Date d'expriration : "."<input type=\"password\" value=\"$dateExpiration\" id=\"dateExpCarteSecret\">"
                  ."<input type=\"checkbox\" onclick=\"showSecretData('dateExpCarteSecret')\">"."<i class=\"fa fa-low-vision\">"."</i>"."<br>"."<br>"
                  ."CVV : "."<input type=\"password\" value=\"$codeSecurite\" id=\"CVVCarteSecret\">"
                  ."<input type=\"checkbox\" onclick=\"showSecretData('CVVCarteSecret')\">"."<i class=\"fa fa-low-vision\">"."</i>"."</p>");

              }//end while

            }//end if
            //si le BDD n'existe pas
            else {
            echo "Database not found";
            }//end else
            //fermer la connection
            mysqli_close($db_handle);

          ?>

          <a href="popupConnexion.php">
                  <button type="button"
                    style="background-color: #80008040;
                    font-size: medium;
                    color: black;
                    border: none;
                    border-radius: 25px;
                    cursor: pointer;
                    opacity: 0.8;
                    position: absolute;
                    top: 125px;
                    margin-left: 50%;
                    padding: 8px;"
                  >Déconnexion</button>
                </a>

      </div>

      <div id="footer">
        <p>
          Copyright &copy; 2022, Omnes Santé<br><br>
          <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
        </p>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.081761528267!2d2.2863111515249366!3d48.87571787604028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ff2e51e5f8b%3A0xd1996d079d18a7cd!2s59%20Av.%20de%20la%20Grande%20Arm%C3%A9e%2C%2075116%20Paris!5e0!3m2!1sfr!2sfr!4v1653816525128!5m2!1sfr!2sfr" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </div>

  </body>
</html>
