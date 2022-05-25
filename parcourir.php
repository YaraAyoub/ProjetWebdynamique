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
          <a onclick="openFormCo()"><button class="button">Votre compte</button></a>
          <a href="rdv.php"><button class="button">RDV</button></a>
          <a href="recherche.php"><button class="button">Recherche</button></a>
          <a href="parcourir.php"><button class="button">Tout Parcourir</button></a>
          <a href="index.php"><button class="button">Accueil</button></a>

        </div>
      </div>


      <div id="section">

<div id="section2">

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
            $sql = "SELECT Nom, Prenom , Image FROM medecin WHERE Specialiste='generaliste'";

            $result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $doc = "Dr ".$data['Prenom']." ".strtoupper($data['Nom']);

              $image=$data['Image'];
              echo("<a onclick=\"openForm('{$doc}')\"> <img src=\"PhotoProfils/$image\" height='120' width='100'> $doc</a>");
              // echo ("<img src=\"PhotoProfils/$image\" height='120' width='100'>");

            //  echo("<a onclick=\"openForm('{$doc}')\">$doc</a>");

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
        <!-- Top Navigation Menu -->
        <div class="topnav">
          <a href="#home" class="active">Médecins spécialistes</a>
          <div id="myLinks2">
            <a href="#Addictologie">Addictologie</a>
            <a href="#Andrologie">Andrologie</a>
            <a href="#Cardiologie">Cardiologie</a>
            <a href="#Dermatologie">Dermatologie</a>
            <a href="#GastroHepatoEnterologie">Gastro-Hépato-Entérologie</a>
            <a href="#Gynecologie">Gynécologie</a>
            <a href="#IST">I.S.T.</a>
            <a href="#Osteopathie">Ostéopathie</a>
          </div>

          <a href="javascript:void(0);" class="icon" onclick="dropDownSpe()">
          <i class="fa fa-chevron-down"></i>
          </a>

        </div>

          <!-- Top Navigation Menu -->
          <div class="topnav">
            <a href="#home" class="active">Laboratoire de biologie médicale</a>
            <div id="myLinks3">
              <a href="#PriseDeSang">Prise de sang</a>
              <a href="#ExaminUrine">Examen de l'urine</a>
              <a href="#DepistageCovid">Dépistage Covid</a>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="dropDownLab()">
            <i class="fa fa-chevron-down"></i>

            </a>
          </div>

    </div>
</div>

    <div class="login-popup">
      <div class="form-popup" id="popupForm" onclick="closeForm()">

      </div>

      <div class="form-container" id="pagePopup">

        <img src="PhotoProfils/Garcia.jpg" alt="photo dr" width="130" height="150"
          style="position: fixed;
          margin-left: -385px;
          margin-top: 45px;
          border-radius:25%"
        >
        <!--TODO-->
        <div style="position: fixed;top: 120px;width: 260px;margin-left: 214px;padding-right: 20px;text-align: left;">
        <h2 id="namedoc"></h2>
        <h3>Médecin généraliste</h3>
        </div>

        <div style="position: fixed;top: 120px;margin-left: 494px;">
          <p style="padding-right: 30px;text-align: left;">
            Bureau : 405 <br>
            Adresse: 123 Boulevard de la Reine, 78000, Versailles <br>
            DigiCode: - <br><br>
            Telephone : 0612345678 <br>
            mail : doc.teur@gmail.com <br>
          </p>
        </div>


        <div class="grid-container">
          <div style="border: none;background: none;"></div>
          <div style="border-bottom: none;border-right: none;">Lundi</div>
          <div style="border-bottom: none;border-right: none;">Mardi</div>
          <div style="border-bottom: none;border-right: none;">Mercredi</div>
          <div style="border-bottom: none;border-right: none;">Jeudi</div>
          <div style="border-bottom: none;border-right: none;">Vendredi</div>
          <div style="border-bottom: none;">Samedi</div>
          <div style="border-bottom: none;border-right: none;">Matin</div>
          <div id="lunMat" style="border-bottom: none;border-right: none;"></div>
          <div id="marMat" style="border-bottom: none;border-right: none;"></div>
          <div id="merMat" style="border-bottom: none;border-right: none;"></div>
          <div id="jeuMat" style="border-bottom: none;border-right: none;"></div>
          <div id="venMat" style="border-bottom: none;border-right: none;"></div>
          <div id="samMat" style="border-bottom: none;"></div>
          <div style="border-right: none;">Aprem</div>
          <div id="lunAprem" style="border-right: none;"></div>
          <div id="marAprem" style="border-right: none;"></div>
          <div id="merAprem" style="border-right: none;"></div>
          <div id="jeuAprem" style="border-right: none;"></div>
          <div id="venAprem" style="border-right: none;"></div>
          <div id="samAprem"></div>
        </div>

        <a href="priseRDV.php">
          <button type="button" onclick="closeForm()" style="background-color: #80008040;
            font-size: medium;
            color: black;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            top: 470px;
            margin-left: -360px;
            padding: 8px;"
          >Prendre RDV</button>
        </a>

        <a href="CV.php">
          <button type="button" onclick="closeForm()"
            style="background-color: #80008040;
            font-size: medium;
            color: black;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            top: 470px;
            margin-left: -70px;
            padding: 8px;"
          >Voir son CV</button>
        </a>

        <a href="priseRDV.php">
          <button type="button" onclick="closeForm()"
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
          >Communiquer avec le médecin</button>
        </a>




        <button type="button" class="btn cancel" onclick="closeForm()">X</button>
      </div>
    </div>



    <div class="login-popup">
      <div class="form-popup" id="popupFormCo" onclick="closeFormCo()"></div>

      <div action="/action_page.php" class="form-container-connexion" id="popupCo">
        <button type="button" class="btn cancel" onclick="closeFormCo()">X</button>

        <h2 style="margin-top: 50px;margin-bottom: 25px;">
          J'ai déjà un compte OMNES Santé
        </h2>

        <input type="text" id="email" placeholder="Adresse email" name="email" required=""
          style="margin-bottom: 20px;
            padding-right: 64px;
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 15px;"
        >

        <input type="password" id="psw" placeholder="Mot de passe" name="psw" required=""
          style="margin-bottom: 20px;
            padding-right: 64px;
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 15px;"
        >

        <a href="compte.php"><button type="submit" class="btn co">Connexion</button></a>

        <h2 style="margin-top: 40px;font-size: 0.9em;">
          Nouveau sur OMNES Santé ?
        </h2>

        <a href="inscription.php"><button type="button" class="btn insc" onclick="closeFormCo">S'inscrire</button></a>

      </div>
    </div>


      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>



  </body>
</html>
