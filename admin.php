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

        <p id="titreA">page admin de <?php echo "$_SESSION[email]"; ?></p>

<!--TODO-->
        <div id="ajout" style ="display: none;
                                margin-top: 5%;
                                margin-left: 32%;
                                background-color: transparent;
                                width: 50%;
                                min-height: 500px;
                                height: 50%;">

          <h1>Ajouter un médecin:</h1>
          <form method="post">

            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="prenom" placeholder="Prenom" required> <br>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <input type="text" name="cv" placeholder="CV" required style="padding-bottom:80px;"><br>
            <input type="email" name="email" placeholder="Email" required>
            <input type="txt" name="bureau" placeholder="Bureau" required><br>
            <input type="Adresse" name="adresse" placeholder="Adresse" required>
            <input type="txt" name="code" placeholder="Digicode" required><br>
            <input type="tel" name="tel" placeholder="Telephone" required>
            <input type="image" name="img" placeholder="Image" required><br>

          </form>

          <button type="submit" class="btn co" style="background-color: #80008040;
            font-size: large;
            margin-top: 8px;
            margin-left: 220px;
            padding: 10px;
            border: none;
            border-radius: 25px;"
          >Ajouter</button>

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

            <button type="submit" class="btn co" style="background-color: #80008040;
              font-size: large;
              margin-top: 8px;
              margin-left: 220px;
              padding: 10px;
              border: none;
              border-radius: 25px;"
            >Supprimer</button>

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


        <div id="compteA" style ="display: none;
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


        <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
          <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
        </div>

      </div>

    </body>
  </html>
