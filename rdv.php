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

      <img src="imagesDeco/doc5.png" alt="OMNES SANTE" width="280" height="300" style="position:absolute;top:200px; left: 10px;"/>
      <img src="imagesDeco/doc4.png" alt="OMNES SANTE" width="220" height="310" style="position:absolute;top:190px; right: 15px"/>

      <div id="section">

        <div id="section2">

          <h2 style="text-align:center">Rendez-vous à venir</h2>

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

                    $idnomDoc = str_replace(" ", "", $nomDoc);
                    echo("
                    <div class=\"rdv\">
                      <a class=\"active\"> $nomDoc <br>Ce $jour à $heure:00 heure</a>

                      <a href=\"#home\" class=\"icon\" id=\"$date$idnomDoc\" onclick=\"clickSuppRdv('{$date}', '{$nomDoc}', '{$idnomDoc}')\">
                        <i class=\"fa fa-trash-o\"></i>

                      </a>
                    </div>");
                  }
                  else
                  {
                    $idnomDoc = str_replace(" ", "", $nomDoc);
                    echo("
                    <div class=\"rdv\">
                      <a class=\"active\">Dr $nomDoc <br>Ce $jour à $heure:00 heure</a>

                      <a href=\"#home\" class=\"icon\" id=\"$date$idnomDoc\" onclick=\"clickSuppRdv('{$date}', '{$nomDoc}','{$idnomDoc}')\">
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

          <h2 style="text-align:center">Rendez-vous passés</h2>
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
