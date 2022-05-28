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


      <div id="section" >

        <div id="section2" style ="display: block;">

          <div class="topnav">
            <a href="#home" class="active" onclick="dropDownDoc()">Médecine générale</a>
            <div id="myLinks1">

          <?php
            //Le nom de la base de donnée visée
            $database = "omnessante";
            //connectez-vous dans votre BDD
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database);
            //si le BDD existe, faire le traitement
            if ($db_found) {
              $sql = "SELECT Nom, Prenom, Specialiste, Email, Bureau, Adresse, DigiCode, Telephone, Image FROM medecin WHERE Specialiste='generaliste' Order by Nom, Prenom";

              $result = mysqli_query($db_handle, $sql);

              while ($data = mysqli_fetch_assoc($result)) {
                // $sql2="SELECT Adresse FROM medecin WHERE Specialiste='generaliste' Order by Nom, Prenom";
                // $result2 = mysqli_query($db_handle, $sql2);


                $doc = "Dr ".$data['Prenom']." ".strtoupper($data['Nom']);
                $image=$data['Image'];

               $sql2 = "SELECT idClient, DateHeure FROM rendezvous WHERE NomMedecin = '$data[Nom]' ";

                $result2 = mysqli_query($db_handle, $sql2);
                $libre = array();
                $nonlibre = array();

                while($data2 = mysqli_fetch_assoc($result2))
                {
                      if($data2['idClient'] == NULL)
                          array_push($libre, $data2['DateHeure']);
                      else
                          array_push($nonlibre, $data2['DateHeure']);
                }
                // echo("<a onclick=\"openForm('{$doc}')\"> <img src=\"PhotoProfils/$image\" height='60' width='50'> $doc</a>");
                echo "<a onclick='openForm(".json_encode($data).",".json_encode($libre).",".json_encode($nonlibre).")'> <img src='PhotoProfils/$image' height='60' width='50'>$doc</a>";

                //remplir le tableau RDV

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
            <a href="#home" class="active" onclick="dropDownSpe()">Médecins spécialistes</a>
            <div id="myLinks2">

              <?php
                //Le nom de la base de donnée visée
                $database = "omnessante";
                //connectez-vous dans votre BDD
                $db_handle = mysqli_connect('localhost', 'root', '' );
                $db_found = mysqli_select_db($db_handle, $database);
                //si le BDD existe, faire le traitement
                if ($db_found) {
                  $sql = "SELECT Distinct Specialiste FROM medecin Order by Specialiste";

                  $result = mysqli_query($db_handle, $sql);

                  while ($data = mysqli_fetch_assoc($result)) {
                    $spe = ucwords($data['Specialiste']);
                    //echo("<a href=\"#{$spe}\">$spe</a>");
                    echo ("<a href=\"#{$spe}\" onclick=\"showDocSpe()\">$spe</a>");

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

            <a href="javascript:void(0);" class="icon" onclick="dropDownSpe()">
            <i class="fa fa-chevron-down"></i>
            </a>

          </div>

            <!-- Top Navigation Menu -->
            <div class="topnav">
              <a href="#home" class="active" onclick="dropDownLab()">Laboratoire de biologie médicale</a>

              <div id="myLinks3">

                <?php
                  //Le nom de la base de donnée visée
                  $database = "omnessante";
                  //connectez-vous dans votre BDD
                  $db_handle = mysqli_connect('localhost', 'root', '' );
                  $db_found = mysqli_select_db($db_handle, $database);
                  //si le BDD existe, faire le traitement
                  if ($db_found) {
                    $sql = "SELECT DISTINCT s.Nom FROM service s, prestation p
                            WHERE s.IdService = p.IdService
                            And p.IdMedLab>=100
                            Order BY s.Nom";

                    $result = mysqli_query($db_handle, $sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                      $exam = $data['Nom'];
                      echo("<a href=\"#{$exam}\">$exam</a>");

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

        <!-- <div id="photodoc"></div> -->
        <img id="photodoc" src="" alt="photo dr" width="130" height="150"
          style="position: fixed;
          margin-left: -385px;
          margin-top: 45px;
          border-radius:25%"
        >

        <!--TODO-->
        <div style="position: fixed;top: 120px;width: 260px;margin-left: 214px;padding-right: 20px;text-align: left;">
        <h2 id="namedoc"></h2>
        <h3 id="spedoc"></h3>
        </div>

        <div style="position: fixed;top: 120px;margin-left: 494px;">
          <p id="infodoc" style="padding-right: 30px;text-align: left;"> </p>
        </div>


        <div class="grid-container">
          <div style="border: none;background: none;"></div>
          <div class="case0">Lundi</div>
          <div class="case0">Mardi</div>
          <div class="case0">Mercredi</div>
          <div class="case0">Jeudi</div>
          <div class="case0">Vendredi</div>
          <div class="case2.0">Samedi</div>
          <div class="case0">Matin</div>
          <div id="lunMat" class="case0"></div>
          <div id="marMat" class="case0"></div>
          <div id="merMat" class="case0"></div>
          <div id="jeuMat" class="case0"></div>
          <div id="venMat" class="case0"></div>
          <div id="samMat" class="case2.0"></div>
          <div class="case0.1">Aprem</div>
          <div id="lunAprem" class="case0.1"></div>
          <div id="marAprem" class="case0.1"></div>
          <div id="merAprem" class="case0.1"></div>
          <div id="jeuAprem" class="case0.1"></div>
          <div id="venAprem" class="case0.1"></div>
          <div id="samAprem"></div>
        </div>


          <button id="buttonRDV" type="button" onclick="openPriseRDV()" style="background-color: #80008040;
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

    <form action="confirmationRDV.php" method="POST">
      <input id="choixDocRDV" name="choixDocRDV" type="text" style="display:none; position:absolute; top:2%" value="">
      <input id="choixDateRDV" name="choixDateRDV" type="text" style="display:none; position:absolute; top:0%" value="" required>
      <input id="submitChoixRDV" class="submitbtn" type="submit" value="Choisir ce RDV" style="display: none;">
    </form>


    <div id="priseRDV" style ="display:none;
                            margin-top: 5%;
                            margin-left: 15%;
                            background-color: transparent;
                            width: 70%;
                            min-height: 100px;
                            height: 50%;
                            text-align: center;
                            position: absolute;
                            top: 10%;
                            overflow: auto;">

      <h1 id="priseRDVnomDoc">Prise de RDV avec </h1>
      <h2 id="priseRDVspeDoc"></h2>

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

        <a href = "#" id="lun11" class="case" style="color:black;">11:00</a>
        <a href = "#" id="mar11" class="case" style="color:black;">11:00</a>
        <a href = "#" id="mer11" class="case" style="color:black;">11:00</a>
        <a href = "#" id="jeu11" class="case" style="color:black;">11:00</a>
        <a href = "#" id="ven11" class="case" style="color:black;">11:00</a>
        <a href = "#" id="sam11" class="case2" style="color:black;">11:00</a>

        <a href = "#" id="lun12" class="case" style="color:black;">12:00</a>
        <a href = "#" id="mar12" class="case" style="color:black;">12:00</a>
        <a href = "#" id="mer12" class="case" style="color:black;">12:00</a>
        <a href = "#" id="jeu12" class="case" style="color:black;">12:00</a>
        <a href = "#" id="ven12" class="case" style="color:black;">12:00</a>
        <a href = "#" id="sam12" class="case2" style="color:black;">12:00</a>

        <a href = "#" id="lun14" class="case" style="color:black;">14:00</a>
        <a href = "#" id="mar14" class="case" style="color:black;">14:00</a>
        <a href = "#" id="mer14" class="case" style="color:black;">14:00</a>
        <a href = "#" id="jeu14" class="case" style="color:black;">14:00</a>
        <a href = "#" id="ven14" class="case" style="color:black;">14:00</a>
        <a href = "#" id="sam14" class="case2" style="color:black;">14:00</a>

        <a href = "#" id="lun15" class="case" style="color:black;">15:00</a>
        <a href = "#" id="mar15" class="case" style="color:black;">15:00</a>
        <a href = "#" id="mer15" class="case" style="color:black;">15:00</a>
        <a href = "#" id="jeu15" class="case" style="color:black;">15:00</a>
        <a href = "#" id="ven15" class="case" style="color:black;">15:00</a>
        <a href = "#" id="sam15" class="case2" style="color:black;">15:00</a>

        <a href = "#" id="lun16" class="case" style="color:black;">16:00</a>
        <a href = "#" id="mar16" class="case" style="color:black;">16:00</a>
        <a href = "#" id="mer16" class="case" style="color:black;">16:00</a>
        <a href = "#" id="jeu16" class="case" style="color:black;">16:00</a>
        <a href = "#" id="ven16" class="case" style="color:black;">16:00</a>
        <a href = "#" id="sam16" class="case2" style="color:black;">16:00</a>

        <a href = "#" id="lun17" class="case3" style="color:black;">17:00</a>
        <a href = "#" id="mar17" class="case3" style="color:black;">17:00</a>
        <a href = "#" id="mer17" class="case3" style="color:black;">17:00</a>
        <a href = "#" id="jeu17" class="case3" style="color:black;">17:00</a>
        <a href = "#" id="ven17" class="case3" style="color:black;">17:00</a>
        <a href = "#" id="sam17" class="case3" style="color:black; border: 2px solid #800080;">17:00</a>

      </div>

    </div>

      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
