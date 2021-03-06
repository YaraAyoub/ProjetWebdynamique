<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="logo.jpg" rel="icon" type="images/x-icon" />
     <script type="text/javascript" src="fctAdMed.js"></script>
     <meta charset="utf-8" />
  </head>

  <style>

  input{

    margin-top: 20px;
    padding-bottom: 10px;

  }

  </style>


    <body>

      <div id="logo">
        <img src="logo4.png" alt="OMNES SANTE" width="310" height="80" />
      </div>

      <div id="wrapper">

        <div id="header">

          <div class="btn-group">
            <a onclick="compteA()"><button class="button">Votre compte</button></a>
            <a onclick="info()"><button class="button">Informations</button></a>
            <a onclick="suppdoc()"><button class="button">Supprimer un médecin</button></a>
            <a onclick="ajoutdoc()"><button class="button">Ajouter un médecin</button></a>

          </div>
        </div>


        <div id="section">

        <h2 style="color: white"></h2>



        <div id="ajout" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">

          <h1>Ajouter un médecin:</h1>
          <form method="post" enctype="multipart/form-data">

            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="prenom" placeholder="Prenom" required> <br>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <input type="text" name="cv" placeholder="CV" required style="padding-bottom:80px;"><br>
            <input type="email" name="email" placeholder="Email" required>
            <input type="txt" name="bureau" placeholder="Bureau" required><br>
            <input type="Adresse" name="adresse" placeholder="Adresse" required>
            <input type="txt" name="code" placeholder="Digicode" required><br>
            <input type="tel" name="tel" placeholder="Telephone" required>
            <input type="tel" name="spe" placeholder="Specialisation" required></br>
            <!-- <input type="image" name="img" placeholder="Image" required><br> -->
            <label>Photo de Profil (.jpg)</label>
            <input type="file" name="img" placeholder="Image" required><br>

            <input type="submit" name="submit" value="Ajouter" class="btn co" style="background-color: #80008040;
              font-size: large;
              margin-top: 8px;
              margin-left: 220px;
              padding: 10px;
              border: none;
              border-radius: 25px;">

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
                 $mdp = $_POST['mdp'];
                 $cv = $_POST['cv'];
                 $email = $_POST['email'];
                 $bureau = $_POST['bureau'];
                 $adresse = $_POST['adresse'];
                 $code = $_POST['code'];
                 $tel = $_POST['tel'];
                 $spe = $_POST['spe'];
                 //Ajout a la base de donné

                 //Le nom de la base de donnée visée
                 $database = "omnessante";
                 //connectez-vous dans votre BDD
                 $db_handle = mysqli_connect('localhost', 'root', '' );
                 $db_found = mysqli_select_db($db_handle, $database);

                 //si le BDD existe, faire le traitement
                 if ($db_found) {

                   $sqlcheck = "SELECT count(*) nmb FROM `medecin` WHERE Email='$email'";

                   $resultatcheck = mysqli_query($db_handle, $sqlcheck);
                   $datacheck = mysqli_fetch_assoc($resultatcheck);
                   $countcheck = $datacheck['nmb'];

                   if($countcheck==0){
                     $sqlCalendrier="INSERT INTO `calendrier` (`IdCalendrier`) VALUES (NULL);";
                     mysqli_query($db_handle, $sqlCalendrier);

                     $sqlCalendrier="SELECT MAX(IdCalendrier) as max FROM calendrier";
                     $resultatcalendrier=mysqli_query($db_handle, $sqlCalendrier);
                     $datacalendrier = mysqli_fetch_assoc($resultatcalendrier);
                     $nmbCalendrier = $datacalendrier['max'];

                     $sql="INSERT INTO medecin (`IdMedecin`, `IdCalendrier`, `Nom`, `Prenom`, `MdP`, `Specialiste`, `CV`, `Email`, `Bureau`, `Adresse`, `DigiCode`, `Telephone`, `Image`) VALUES (NULL, $nmbCalendrier, '$nom', '$prenom', '$mdp', '$spe', '$cv', '$email', '$bureau', '$adresse', '$code', '$tel', '$nomPP')";

                     if(mysqli_query($db_handle, $sql))
                      echo '<script>alert("Le medecin a été ajouter")</script>';
                     else
                      echo '<script>alert("ERROR erg:'.$sql.'")</script>';
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

<!--TODO-->
        <div id="supp" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">

          <h1>Supprimer un médecin:</h1>

          <form method="post">

            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="prenom" placeholder="Prenom" required> <br>
            <input type="email" name="email" placeholder="Email" required><br>

            <input type="submit" name="submit1" value="Supprimer" class="btn co" style="background-color: #80008040;
              font-size: large;
              margin-top: 8px;
              margin-left: 220px;
              padding: 10px;
              border: none;
              border-radius: 25px;">

            <?php
              if ( isset( $_POST['submit1'] ) ){
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];

                $sql = "DELETE FROM `medecin` WHERE `medecin`.`Email` = '$email'";

                //Le nom de la base de donnée visée
                $database = "omnessante";
                //connectez-vous dans votre BDD
                $db_handle = mysqli_connect('localhost', 'root', '' );
                $db_found = mysqli_select_db($db_handle, $database);

                //si le BDD existe, faire le traitement
                if ($db_found) {
                  // $sql = "DELETE FROM `medecin` WHERE `medecin`.`Email` = '$email'";
                  echo '<script>alert("'.$sql.'")</script>';
                  if(mysqli_query($db_handle, $sql))
                   echo '<script>alert("Le medecin a été supprimer")</script>';
                  else
                   echo '<script>alert("ERROR erg:'.$sql.'")</script>';

                }//end if
                //si le BDD n'existe pas
                else {
                echo "Database not found";
                }//end else
                //fermer la connection
                mysqli_close($db_handle);
              }
            ?>

          </form>

        </div>

<!--TODO-->
        <div id="info" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">


        </div>


        <div id="compteA" style ="display: block;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">


           <img src="imagesDeco/compte.jpg" alt="OMNES SANTE" width="200" height="220" style="position:absolute;top:120px; left: 70px"/>



            <h2 style="margin-top: 50px;margin-bottom: 25px;text-align: center;">
                <i class="fa fa-user"></i> Vos informations personnelles:
            </h2>

            <?php
            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT Nom, Prenom, Email
              FROM admin
              WHERE email='$_SESSION[email]'";

              $result = mysqli_query($db_handle, $sql);

              while ($data = mysqli_fetch_assoc($result)) {
                $prenom = $data['Prenom'];
                $nom = strtoupper($data['Nom']);
                $email = $data['Email'];

                echo ("<p style=\"margin-bottom: 20px;padding-top: 8px;padding-bottom: 8px;\">"
                  ."Prénom : ".$prenom."<br>"."<br>"
                  ."Nom : ".$nom."<br>"."<br>"
                  ."Email : ".$email."<br>"."<br>");
              }
            }

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
