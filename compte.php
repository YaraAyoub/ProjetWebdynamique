<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="logo.jpg" rel="icon" type="images/x-icon" />
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

          <h2 style="margin-top: 50px;margin-bottom: 25px;margin-left: 210px;">
            Vos informations personnelles:
          </h2>

          <?php
            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT Nom, Prenom, MdP, Email, CarteVital, DateNaissance, Adresse1, Adresse2, CodePostal, Pays FROM client WHERE email='alexandre.teixera@gmail.com'";

              $result = mysqli_query($db_handle, $sql);


                $prenom = $result['Prenom'];
                $nom = strtoupper($data['Nom']);
                $mdp = $data['MdP'];
                $mdp = $data['Email'];
                $mdp = $data['CarteVital'];
                $mdp = $data['DateNaissance'];
                $mdp = $data['Adresse1'];



              echo ("<p id=\"nomClient\" style=\"margin-bottom: 20px;padding-right: 64px;padding-top: 8px;padding-bottom: 8px;\">"
                ."Prénom: ".$prenom."</p>");
            }//end if
            //si le BDD n'existe pas
            else {
            echo "Database not found";
            }//end else
            //fermer la connection
            mysqli_close($db_handle);
          ?>


<!--
            <input type="text" id="prenom" placeholder="Prénom" name="prenom" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="text" id="dateNaissance" placeholder="Date de naissance (AAAA-MM-JJ)" name="dateNaissance" required="" style="margin-bottom: 20px;
                padding-right: 7px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;
                width: 250px;"
            >

            <input type="text" id="adresse" placeholder="Adresse" name="adresse" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="number" id="carteVitale" placeholder="Carte Vitale" name="carteVitale" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >


            <h2 style="margin-top: 40px;font-size: 0.9em;">
              Information de connexion
            </h2>

            <input type="text" id="email" placeholder="Adresse email" name="email" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="password" id="psw" placeholder="Mot de passe" name="psw" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <h2 style="margin-top: 40px;font-size: 0.9em;">
              Information de paiement
            </h2>

            <input type="text" id="nomCarte" placeholder="Nom sur la carte" name="nomCarte" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="number" id="numCarte" placeholder="Numero de carte" name="numCarte" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="text" id="typeCarte" placeholder="Type de carte" name="typeCarte" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="text" id="expCarte" placeholder="Date d'expiration (AAAA-MM)" name="expCarte" required=""
              style="margin-bottom: 20px;
                padding-right: 7px;
                width:250px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="number" id="CVV" placeholder="CVV" name="CVV" required="" style="margin-bottom: 20px;
                padding-right: -7px;
                padding-top: 8px;
                padding-bottom: 8px;
                margin-left: 140px;
                margin-right: 170px;
                font-size: 15px;"
            >

            <a href="compte.php">
              <button type="submit" class="btn co" style="background-color: #80008040;
                font-size: large;
                margin-top: 8px;
                margin-left: 220px;
                padding: 10px;
                border: none;
                border-radius: 25px;"
              >Valider</button>
            </a>

        </div>
-->
      </div>

      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
