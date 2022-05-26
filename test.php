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

    <div class="topnav">
      <a href="#home" class="active">Médecine générale</a>
      <div id="myLinks1">

    <?php
      //Le nom de la base de donnée visée
      $database = "omnessante";
      //connectez-vous dans votre BDD
      $db_handle = mysqli_connect('localhost', 'root', '' );
      $db_found = mysqli_select_db($db_handle, $database);
      //si le BDD existe, faire le traitement
      if ($db_found) {
        $sql = "SELECT Nom, Prenom, IdMedecin FROM medecin WHERE Specialiste='generaliste'";

        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
          $doc = "Dr ".$data['Prenom']." ".strtoupper($data['Nom']);
          $iddoc = $data['IdMedecin'];
          echo("<a id=$iddoc onclick=\"openForm()\">$doc</a>");

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

    <a href="javascript:void(0);" class="icon" onclick="dropDownDoc()">
    <i class="fa fa-chevron-down"></i>

    </a>
    </div>

    <?php
      include ('popupCo.php');
     ?>

  </body>
