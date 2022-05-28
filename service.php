<?php
session_start();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="index.css" rel="stylesheet" type="text/css" />
      <link href="service.css" rel="stylesheet" type="text/css" />
      <link href="rdv.css" rel="stylesheet" type="text/css" />
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
          <a href="parcourir.php"><button class="button">Tout parcourir</button></a>
          <a href="index.php"><button class="button">Accueil</button></a>

        </div>
      </div>


    <div id="section">

      <div id="section2">

        <?php

          $service = $_POST["choixService"];
        //  $idService = $_POST["choixIdService"];

          echo ("<h2>Service : ".$service."</h2>");

          //Le nom de la base de donnée visée
          $database = "omnessante";
          //connectez-vous dans votre BDD
          $db_handle = mysqli_connect('localhost', 'root', '' );
          $db_found = mysqli_select_db($db_handle, $database);
          //si le BDD existe, faire le traitement
          if ($db_found) {
            $sql = "SELECT idClient, DateHeure FROM rendezvous WHERE NomMedecin = '$service' ";

            $result = mysqli_query($db_handle, $sql);

            $libre = array();
            $nonlibre = array();

            while ($data = mysqli_fetch_assoc($result)) {


              if($data['idClient'] == NULL)
                  array_push($libre, $data['DateHeure']);
              else
                  array_push($nonlibre, $data['DateHeure']);

            }

            echo "<script type=\"text/javascript\">

              calendrierSL(".json_encode($libre).");

            </script>
            ";

            echo "<a href = \"#\" id=\"lun8\" onclick=\"takeResa('lun8')\" class=\"case\" style=\"color:black;\">08:00</a>";


/*
            while ($data = mysqli_fetch_assoc($result)) {

              if($data['idClient'] == NULL){
                $libre = $data['DateHeure'];

                echo "<script type=\"text/javascript\">

                  calendrierSLLibre('{$libre}');

                </script>";
              }


              else{
                $nonlibre = $data['DateHeure'];

                echo "<script type=\"text/javascript\">

                  calendrierSLnonLibre('{$nonlibre}');

                </script>";
              }

            }//end while

*/


          }//end if
          //si le BDD n'existe pas
          else {
          echo "Database not found";
          }//end else
          //fermer la connection
          mysqli_close($db_handle);
        ?>

<!--

        <div style ="display: grid;
                  grid-template-columns: auto auto auto auto auto auto;
                  background-color: #ddd;
                  border-radius: 25px;
                  padding: 10px;
                  margin-left: 50px;
                  overflow: auto;">
          <div class="case4"><strong>Lundi</strong></div>
          <div class="case4"><strong>Mardi</strong></div>
          <div class="case4"><strong>Mercredi</strong></div>
          <div class="case4"><strong>Jeudi</strong></div>
          <div class="case4"><strong>Vendredi</strong></div>
          <div class="case5"><strong>Samedi</strong></div>

          <a href = "#" id="lun8" onclick="takeResa('lun8')" class="case" style="color:black;">08:00</a>
          <a href = "#" id="mar8" onclick="takeResa('mar8')"class="case" style="color:black;">08:00</a>
          <a href = "#" id="mer8" onclick="takeResa('mer8')"class="case" style="color:black;">08:00</a>
          <a href = "#" id="jeu8" onclick="takeResa('jeu8')"class="case" style="color:black;">08:00</a>
          <a href = "#" id="ven8" onclick="takeResa('ven8')"class="case" style="color:black;">08:00</a>
          <a href = "#" id="sam8" onclick="takeResa('sam8')"class="case2" style="color:black;">08:00</a>

          <a href = "#" id="lun9" onclick="takeResa('lun9')"class="case" style="color:black;">09:00</a>
          <a href = "#" id="mar9" onclick="takeResa('mar9')"class="case" style="color:black;">09:00</a>
          <a href = "#" id="mer9" onclick="takeResa('mer9')"class="case" style="color:black;">09:00</a>
          <a href = "#" id="jeu9" onclick="takeResa('jeu9')"class="case" style="color:black;">09:00</a>
          <a href = "#" id="ven9" onclick="takeResa('ven9')"class="case" style="color:black;">09:00</a>
          <a href = "#" id="sam9" onclick="takeResa('sam9')"class="case2" style="color:black;">09:00</a>

          <a href = "#" id="lun10" onclick="takeResa('lun10')"class="case" style="color:black;">10:00</a>
          <a href = "#" id="mar10" onclick="takeResa('mar10')"class="case" style="color:black;">10:00</a>
          <a href = "#" id="mer10" onclick="takeResa('mer10')"class="case" style="color:black;">10:00</a>
          <a href = "#" id="jeu10" onclick="takeResa('jeu10')"class="case" style="color:black;">10:00</a>
          <a href = "#" id="ven10" onclick="takeResa('ven10')"class="case" style="color:black;">10:00</a>
          <a href = "#" id="sam10" onclick="takeResa('sam10')"class="case2" style="color:black;">10:00</a>

          <a href = "#" id="lun11" onclick="takeResa('lun11')"class="case" style="color:black;">11:00</a>
          <a href = "#" id="mar11" onclick="takeResa('mar11')"class="case" style="color:black;">11:00</a>
          <a href = "#" id="mer11" onclick="takeResa('mer11')"class="case" style="color:black;">11:00</a>
          <a href = "#" id="jeu11" onclick="takeResa('jeu11')"class="case" style="color:black;">11:00</a>
          <a href = "#" id="ven11" onclick="takeResa('ven11')"class="case" style="color:black;">11:00</a>
          <a href = "#" id="sam11" onclick="takeResa('sam11')"class="case2" style="color:black;">11:00</a>

          <a href = "#" id="lun12" onclick="takeResa('lun12')"class="case" style="color:black;">12:00</a>
          <a href = "#" id="mar12" onclick="takeResa('mar12')"class="case" style="color:black;">12:00</a>
          <a href = "#" id="mer12" onclick="takeResa('mer12')"class="case" style="color:black;">12:00</a>
          <a href = "#" id="jeu12" onclick="takeResa('jeu12')"class="case" style="color:black;">12:00</a>
          <a href = "#" id="ven12" onclick="takeResa('ven12')"class="case" style="color:black;">12:00</a>
          <a href = "#" id="sam12" onclick="takeResa('sam12')"class="case2" style="color:black;">12:00</a>

          <a href = "#" id="lun14" onclick="takeResa('lun14')"class="case" style="color:black;">14:00</a>
          <a href = "#" id="mar14" onclick="takeResa('mar14')"class="case" style="color:black;">14:00</a>
          <a href = "#" id="mer14" onclick="takeResa('mer14')"class="case" style="color:black;">14:00</a>
          <a href = "#" id="jeu14" onclick="takeResa('jeu14')"class="case" style="color:black;">14:00</a>
          <a href = "#" id="ven14" onclick="takeResa('ven14')"class="case" style="color:black;">14:00</a>
          <a href = "#" id="sam14" onclick="takeResa('sam14')"class="case2" style="color:black;">14:00</a>

          <a href = "#" id="lun15" onclick="takeResa('lun15')"class="case" style="color:black;">15:00</a>
          <a href = "#" id="mar15" onclick="takeResa('mar15')"class="case" style="color:black;">15:00</a>
          <a href = "#" id="mer15" onclick="takeResa('mer15')"class="case" style="color:black;">15:00</a>
          <a href = "#" id="jeu15" onclick="takeResa('jeu15')"class="case" style="color:black;">15:00</a>
          <a href = "#" id="ven15" onclick="takeResa('ven15')"class="case" style="color:black;">15:00</a>
          <a href = "#" id="sam15" onclick="takeResa('sam15')"class="case2" style="color:black;">15:00</a>

          <a href = "#" id="lun16" onclick="takeResa('lun16')"class="case" style="color:black;">16:00</a>
          <a href = "#" id="mar16" onclick="takeResa('mar16')"class="case" style="color:black;">16:00</a>
          <a href = "#" id="mer16" onclick="takeResa('mer16')"class="case" style="color:black;">16:00</a>
          <a href = "#" id="jeu16" onclick="takeResa('jeu16')"class="case" style="color:black;">16:00</a>
          <a href = "#" id="ven16" onclick="takeResa('ven16')"class="case" style="color:black;">16:00</a>
          <a href = "#" id="sam16" onclick="takeResa('sam16')"class="case2" style="color:black;">16:00</a>

          <a href = "#" id="lun17" onclick="takeResa('lun17')"class="case3" style="color:black;">17:00</a>
          <a href = "#" id="mar17" onclick="takeResa('mar17')"class="case3" style="color:black;">17:00</a>
          <a href = "#" id="mer17" onclick="takeResa('mer17')"class="case3" style="color:black;">17:00</a>
          <a href = "#" id="jeu17" onclick="takeResa('jeu17')"class="case3" style="color:black;">17:00</a>
          <a href = "#" id="ven17" onclick="takeResa('ven17')"class="case3" style="color:black;">17:00</a>
          <a href = "#" id="sam17" onclick="takeResa('sam17')"class="case3" style="color:black; border: 2px solid #800080;">17:00</a>

        </div>

-->

        </div>



      </div>



    <form action="confirmationRDV.php" method="POST">
      <input id="choixLabRDV" name="choixLabRDV" type="text" style="display:none; position:absolute; top:2%" value="">
      <input id="choixDateLabRDV" name="choixDateLabRDV" type="text" style="display:none; position:absolute; top:0%" value="" required>
      <input id="submitChoixLabRDV" class="submitbtn" type="submit" value="Choisir ce RDV" style="display: block;">
    </form>


      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
