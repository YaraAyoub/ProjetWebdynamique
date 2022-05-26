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

          <?php

            session_start();
            $mailCo = $_SESSION['email'];

            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT c.Image, c.Nom, c.Prenom, c.MdP, c.Email, c.CarteVital, c.DateNaissance, c.Adresse1, c.Adresse2, c.CodePostal, c.Pays, p.Type, p.Numero, p.DateExpiration, p.CodeSecurite
              FROM client c, payment p
              WHERE email='$mailCo'
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

                echo ("<img src=\"PhotoProfils/$photoProfil\" height='120' width='100' style=\"padding-left: 210px;\">");

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

      </div>

      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
