<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="inscription.css" rel="stylesheet" type="text/css" />
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
          <a ><button class="button">Votre compte</button></a>
          <a><button class="button">RDV</button></a>
          <a ><button class="button">Recherche</button></a>
          <a><button class="button">Tout Parcourir</button></a>
          <a><button class="button">Accueil</button></a>

        </div>
      </div>

      <div id="section">

        <div id="section2">

          <h2 style="margin-top: 50px;margin-bottom: 25px;margin-left: 210px;">
            Inscription
          </h2>

          <form method="post" enctype="multipart/form-data">

            <input type="text" id="nom" placeholder="Nom" name="nom" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
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

            <input type="number" id="carteVitale" placeholder="Carte Vitale" name="carteVitale" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="tel" id="tel" placeholder="Telephone" name="tel" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            ><br>

            <input type="text" id="adresse1" placeholder="Adresse 1" name="adresse1" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="text" id="adresse2" placeholder="Adresse 2" name="adresse2"
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="number" id="codePostal" placeholder="Code Postal " name="codePostal" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="text" id="pays" placeholder="Pays" name="pays" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <br>
            <label>Photo de Profil (.jpg)</label>
            <input type="file" name="img" placeholder="Image" required>


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
              <input type="submit" name="submit" value="Valider" class="btn co" style="background-color: #80008040;
                font-size: large;
                margin-top: 8px;
                margin-left: 220px;
                padding: 10px;
                border: none;
                border-radius: 25px;"
                >
            </a>

            <?php
            $nomPP = "pas de photo";
             //Vérifie si un fichier est Ajouter
             if(isset($_FILES['img']) AND !empty($_FILES['img']['name'])) {
               $tailleMax = 2097152;//taille Max de fichier
               $extensionsValides = array('jpg');
               if($_FILES['img']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {//Vérification du format
                     $chemin = "PhotoProfils/".$_POST['nom'].".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);
                     if($resultat) {
                       $nomPP = $_POST['nom'].".".$extensionUpload;

                     } else {
                        $msg = "Erreur durant l'importation de votre photo de profil";
                     }
                  } else {
                     $msg = "Votre photo de profil doit être au format jpg";
                  }
               } else {
                  $msg = "Votre photo ne doit pas dépasser 2Mo";
               }
             }
             // Vérifier si le formulaire est envoyé
             if ( isset( $_POST['submit'] ) ) {
               $nom = $_POST['nom'];
               $prenom = $_POST['prenom'];
               $dateNaissance = $_POST['dateNaissance'];
               $carteVitale = $_POST['carteVitale'];
               $telphone = $_POST['tel'];
               $adresse1  = $_POST['adresse1'];
               $adresse2 = $_POST['adresse2'];
               $codePostal = $_POST['codePostal'];
               $pays = $_POST['pays'];
               $email = $_POST['email'];
               $mdp = $_POST['psw'];
               $nomCarte = $_POST['nomCarte'];
               $numCarte = $_POST['numCarte'];
               $typeCarte = $_POST['typeCarte'];
               $expCarte = $_POST['expCarte'];
               $CVV = $_POST['CVV'];
               //Ajout a la base de donné

               //Le nom de la base de donnée visée
               $database = "omnessante";
               //connectez-vous dans votre BDD
               $db_handle = mysqli_connect('localhost', 'root', '' );
               $db_found = mysqli_select_db($db_handle, $database);

               //si le BDD existe, faire le traitement
               if ($db_found) {

                 $sqlcheck = "SELECT count(*) nmb FROM `client` WHERE Email='$email'";

                 $resultatcheck = mysqli_query($db_handle, $sqlcheck);
                 $datacheck = mysqli_fetch_assoc($resultatcheck);
                 $countcheck = $datacheck['nmb'];

                 if($countcheck==0){
                   $sqlPayment="INSERT INTO `payment` (`IdPayment`, `IdClient`,  `Type`,  `Numero`,  `Nom`,  `DateExpiration`,  `CodeSecurite`) VALUES (NULL, 0, '$typeCarte', '$numCarte', '$nomCarte', '$expCarte', '$CVV');";
                   // mysqli_query($db_handle, $sqlPayment);
                   if(mysqli_query($db_handle, $sqlPayment)){
                     echo '<script>alert("Succès ajout payment")</script>';

                     $sqlPayment="SELECT MAX(IdPayment) as max FROM payment";
                     $resultatpayment=mysqli_query($db_handle, $sqlPayment);
                     $datapayment = mysqli_fetch_assoc($resultatpayment);
                     $nmbPayment = $datapayment['max'];

                     $sql="INSERT INTO client (`IdClient`, `IdPayment`, `Nom`, `Prenom`, `MdP`, `Telephone`, `Email`, `CarteVital`, `DateNaissance`, `Adresse1`, `Adresse2`, `CodePostal`, `Pays`, `Image`) VALUES (NULL, $nmbPayment, '$nom', '$prenom', '$mdp', '$telphone', '$email', '$carteVitale', '$dateNaissance', '$adresse1', '$adresse2', '$codePostal', '$pays', '$nomPP')";

                     if(mysqli_query($db_handle, $sql))
                      echo '<script>alert("Votre profil a été créé")</script>';
                     else
                      echo '<script>alert("ERROR erg:'.$sql.'")</script>';

                      $sqlUpdate="UPDATE `payment` SET `IdClient` = (SELECT IdClient FROM client WHERE Nom ='$nom') WHERE `payment`.`IdClient` = 0; ";
                      mysqli_query($db_handle, $sqlUpdate);
                   }

                   else
                    echo '<script>alert("ERROR erg:'.$sqlPayment.'")</script>';
                 }
               }
               //si le BDD n'existe pas
               else {
               echo "Database not found";
               }
               mysqli_close($db_handle);
               exit;
            }
          ?>
          </form>
        </div>
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
