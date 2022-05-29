<?php
session_start();
?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="logo.jpg" rel="icon" type="images/x-icon" />
     <script type="text/javascript" src="parcours.js"></script>
     <meta charset="utf-8" />
  </head>

  <style>
    #result{
      background-color: transparent;
      /* height: 500px; */
      width: 700px;
      margin-left: 27%;
      margin-top: 40px;
      max-height: 600px;
      overflow: auto;
    }

    .zone{
      background-color: #ddd;
      position: relative;
      margin: 30px;
      border-radius: 30px;
    }
    .zone a {
      color: black;
      padding: 25px 16px;
      text-decoration: none;
      font-size: 17px;
      display: block;
      border-radius: 15px;
    }

    .active {
      background-color: #ddd;
      color: white;
    }
    .search-container form {
      position: relative;
      margin-left: 27%;
      margin-top: 4%;
      width: 670px;
      height: 60px;
    }

    .submitB{
      width: 50px;
      height: 60px;
      font-size: 20px;
      color: #190037;
      cursor: pointer;
      background: transparent;
      border-color: transparent;
    }

    .submitB:hover{
      background-color: purple;
      border-radius: 15px;
      height: 60px;
      color: white;
    }

  </style>

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

      <img src="imagesDeco/doc1.png" alt="OMNES SANTE" width="270" height="310" style="position:absolute;top:200px; left: 30px"/>
      <img src="imagesDeco/doc2.png" alt="OMNES SANTE" width="220" height="310" style="position:absolute;top:190px; right: 15px"/>


      <div id="section">

        <div class="search-container">

            <form action="trouvesearch.php" method="POST">
              <button class="submitB" type="submit"><i class="fa fa-search"></i></button>
              <input type="text" placeholder="Recherche..." name="Recherche" style="height: 50px;width: 600px;
              border-width: 4px; border-color: #190037;border-radius: 15px;">
            </form>

             <div id="result">

            <?php

            if (isset($_SESSION['recherche'])) {


              if ($_SESSION['recherche'] != "") {

                $recherche = $_SESSION['recherche'];

                //Le nom de la base de donnée visée
                $database = "omnessante";
                //connectez-vous dans votre BDD
                $db_handle = mysqli_connect('localhost', 'root', '' );
                $db_found = mysqli_select_db($db_handle, $database);
                //si le BDD existe, faire le traitement
                if ($db_found) {
                  $sql = "SELECT Nom, Prenom, Specialiste, Email, Bureau, Adresse, Telephone, Image
                    FROM Medecin
                    WHERE Nom
                    LIKE '%$recherche%' OR Prenom LIKE '%$recherche%' OR Specialiste LIKE '%$recherche%'
                    ORDER BY Nom";



                  $result = mysqli_query($db_handle, $sql);
                  while($data = mysqli_fetch_assoc($result))
                  {
                    $nom = strtoupper($data['Nom']);
                    $prenom = $data['Prenom'];
                    $spe = $data['Specialiste'];
                    $mail = $data['Email'];
                    $bureau = $data['Bureau'];
                    $adresse = $data['Adresse'];
                    $tel = $data['Telephone'];
                    $image = $data['Image'];


                    echo("
                      <div class=\"zone\">
                        <a class=\"active\">

                        <img style=\"float:right\" src='PhotoProfils/$image' height='120' width='100'>
                        <p>
                          Dr $prenom $nom <br>$spe <br><i class=\"material-icons\">local_post_office</i>$mail <br> <br><i class=\"material-icons\">place</i> : bureau $bureau, $adresse
                        </p>

                        </a>
                      </div>

                    ");


                  }

                }//end if
                //si le BDD n'existe pas
                else {
                  echo "Database not found";
                }//end else
                //fermer la connection
                mysqli_close($db_handle);

                $_SESSION['recherche'] ="";

              }
            }

            ?>

        </div>

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
