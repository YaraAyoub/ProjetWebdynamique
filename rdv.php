<?php
session_start();
?>

<!--https://www.delftstack.com/fr/howto/php/onclick-php/#utilisez-du-javascript-simple-pour-ex%25C3%25A9cuter-la-fonction-php-avec-l%25C3%25A9v%25C3%25A9nement-onclick -->
 <!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link href="index.css" rel="stylesheet" type="text/css" />
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
          <a href="parcourir.php"><button class="button">Tout Parcourir</button></a>
          <a href="index.php"><button class="button">Accueil</button></a>

        </div>
      </div>

      <div id="section">

        <div id="section2">

          <h2>Rendez-vous à venir</h2>

          <form name="submitDeleteRDV"action="confirmDeleteRDV.php" method="POST">
            <input id="choixDateDeleteRDV" name="choixDateDeleteRDV" type="text" style="display:none; position:absolute; top:0%" value="" required>
            <input id="choixDocDeleteRDV" name="choixDocDeleteRDV" type="text" style="display:none; position:absolute; top:0%" value="" required>
            <input id="submitChoixDeleteRDV" class="submitbtnDelete" type="submit" value="Confirmer l'annulation" style="display: none;">
          </form>

          <?php
            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);

            $email = $_SESSION['email'];

            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT NomMedecin, NoteMedecin, DateHeure FROM rendezvous r, client c
                      WHERE r.idClient = c.idClient AND c.Email = '$email' AND NoteMedecin IS NULL";

              $result = mysqli_query($db_handle, $sql);

              while ($data = mysqli_fetch_assoc($result)) {
                $nomDoc = $data['NomMedecin'];
                $noteDoc = $data['NoteMedecin'];
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


                if(($nomDoc == "Prise de sang")||($nomDoc == "Test PCR Covid")||($nomDoc == "Examen urinaire")||($nomDoc == "Examen des selles"))
                  {
                    echo("
                    <div class=\"rdv\">
                      <a class=\"active\"> $nomDoc <br>Ce $jour à $heure:00 heure</a>

                      <a href=\"#home\" class=\"icon\" onclick=\"clickSuppRdv('{$date}', '{$nomDoc}')\">
                        <i class=\"fa fa-trash-o\"></i>

                      </a>
                    </div>");
                  }
                  else
                  {
                    echo("
                    <div class=\"rdv\">
                      <a class=\"active\">Dr $nomDoc <br>Ce $jour à $heure:00 heure</a>

                      <a href=\"#home\" class=\"icon\" id=\"$date$nomDoc\" onclick=\"clickSuppRdv('{$date}', '{$nomDoc}')\">
                        <i class=\"fa fa-trash-o\"></i>

                      </a>
                    </div>");
                  }


              }//end while
            }//end if
            //si le BDD n'existe pas
            else {
            echo "Database not found";
            }//end else
            //fermer la connection
            mysqli_close($db_handle);
          ?>

          <h2>Rendez-vous passés</h2>
          <?php
            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);

            $email = $_SESSION['email'];

            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT NomMedecin, NoteMedecin, DateHeure FROM rendezvous r, client c
                      WHERE r.idClient = c.idClient AND c.Email = '$email' AND NoteMedecin IS NOT NULL";

              $result = mysqli_query($db_handle, $sql);

              while ($data = mysqli_fetch_assoc($result)) {
                $nomDoc = $data['NomMedecin'];
                $noteDoc = $data['NoteMedecin'];
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

                echo("
                <div class=\"rdv\">
                  <a class=\"active\">Dr $nomDoc <br>Note du docteur: $noteDoc <br>Le $jour à $heure:00 heure</a>
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

      </div>



      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
