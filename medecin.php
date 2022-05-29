<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="rdv.css" rel="stylesheet" type="text/css" />
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
            <a onclick="compteM()"><button class="button">Votre compte</button></a>
            <a onclick="conslt()"><button class="button">Consultations</button></a>
            <a onclick="chatroom()"><button class="button">Chatroom</button></a>

          </div>
        </div>


        <div id="section">

        <p id="titreA">page admin de <?php echo "$_SESSION[email]"; ?></p>

<!--TODO-->
        <div id="chatroom" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">

          <h1>Chatroom:</h1>


        </div>

        <div id="conslt" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">

          <h1 style="text-align:center;">Consultations à venir:</h1>

            <?php
              //Le nom de la base de donnée visée
              $database = "omnessante";
              //connectez-vous dans votre BDD
              $db_handle = mysqli_connect('localhost', 'root', '' );
              $db_found = mysqli_select_db($db_handle, $database);

              $email = $_SESSION['email'];

              //si le BDD existe, faire le traitement
              if ($db_found) {
                $sql = "SELECT c.Nom, c.Prenom, r.DateHeure FROM rendezvous r, client c, medecin m
                        WHERE r.idClient = c.idClient AND m.Email = '$email' AND m.Nom = r.NomMedecin AND NoteMedecin IS NULL";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                  $nomPatient = $data['Nom'];
                  $prenomPatient = $data['Prenom'];
                  $date = $data['DateHeure'];
                  $jour = substr($date, 0, 3);
                  if(strlen($date) == 4){
                    $heure = substr($date, -1);
                  }
                  else {
                    $heure = substr($date, -2);
                  }

                  switch ($jour) {
                    case 'lun':
                      $jour = "Lundi";
                      break;
                    case 'mar':
                      $jour = "Mardi";
                      break;
                    case 'mer':
                      $jour = "Mercredi";
                      break;
                    case 'jeu':
                      $jour = "Jeudi";
                      break;
                    case 'ven':
                      $jour = "Vendredi";
                      break;
                    case 'sam':
                      $jour = "Samedi";
                      break;
                  }


                  echo("
                  <div class=\"rdv\">
                    <a class=\"active\">$prenomPatient $nomPatient <br>$jour à $heure:00 heure</a>

                  </div>");


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


        <div id="compteM" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">



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
              FROM medecin
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
