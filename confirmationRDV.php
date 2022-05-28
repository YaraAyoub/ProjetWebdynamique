<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="index.css" rel="stylesheet" type="text/css" />
      <link href="parcourir.css" rel="stylesheet" type="text/css" />
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

      <div id="confirmation" style ="display:block;
                              margin-top: 5%;
                              margin-left: 15%;
                              background-color: transparent;
                              width: 70%;
                              min-height: 800px;
                              height: 50%;
                              text-align: center;
                              position: absolute;
                              top: 10%;
                              overflow: auto;">

        <h1>Confirmation de RDV </h1>

        <?php

          $nomMedecin = $_POST["choixDocRDV"];
          $dateHeure = $_POST["choixDateRDV"];

          $jour = substr($dateHeure, 0, 3);
          if(strlen($dateHeure) == 4){
            $heure = substr($dateHeure, -1);
          }
          else {
            $heure = substr($dateHeure, -2);
          }

          switch ($jour) {
            case 'lun':
              $jour = "lundi";
              break;
            case 'mar':
              $jour = "mardi";
              break;
            case 'mer':
              $jour = "mercredi";
              break;
            case 'jeu':
              $jour = "jeudi";
              break;
            case 'ven':
              $jour = "vendredi";
              break;
            case 'sam':
              $jour = "samedi";
              break;
          }

          echo ("<h2>Ce ".$jour." à ".$heure."h</h2>");
          echo ("<h2>Avec Dr ".$nomMedecin."</h2>");
          //echo ("<h2>".$_SESSION["email"]."</h2>");

          //Le nom de la base de donnée visée
          $database = "omnessante";
          //connectez-vous dans votre BDD
          $db_handle = mysqli_connect('localhost', 'root', '' );
          $db_found = mysqli_select_db($db_handle, $database);
          //si le BDD existe, faire le traitement
          if ($db_found) {
            $sqlId = "SELECT IdClient FROM client WHERE Email = 'gilbert.clement@profil.com'";

            $resultatIdClient = mysqli_query($db_handle, $sqlId);
            $dataId = mysqli_fetch_assoc($resultatIdClient );
            $Id= $dataId ['IdClient'];

            $sql="UPDATE `rendezvous`  SET `idClient` = '$Id' WHERE `rendezvous`.`NomMedecin` = '$nomMedecin' AND `rendezvous`.`DateHeure`= '$dateHeure'; ";
            mysqli_query($db_handle, $sql);


          }//end if
          //si le BDD n'existe pas
          else {
          echo "Database not found";
          }//end else
          //fermer la connection
          mysqli_close($db_handle);


        ?>

        <a href="index.php">
          <button type="button"
            style="background-color: #80008040;
            font-size: medium;
            color: black;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            top: 470px;
            margin-left: 60px;
            padding: 8px;"
          >Retour à la page d'accueil</button>
        </a>


        </div>



      </div>

    </div>


      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
