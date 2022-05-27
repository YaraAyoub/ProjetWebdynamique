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
<!--TODO-->
        <div id="conslt" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">

          <h1>Consultations:</h1>

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


        <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
          <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
        </div>

      </div>

    </body>
  </html>
