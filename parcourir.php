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
                // echo("<a onclick=\"openForm('{$doc}')\"> <img src=\"PhotoProfils/$image\" height='60' width='50'> $doc</a>");
                echo "<a onclick='openForm(".json_encode($data).")'> <img src='PhotoProfils/$image' height='60' width='50'> $doc</a>";


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
                    echo("<a href=\"#{$spe}\">$spe</a>");

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
          <div class="case">Lundi</div>
          <div class="case">Mardi</div>
          <div class="case">Mercredi</div>
          <div class="case">Jeudi</div>
          <div class="case">Vendredi</div>
          <div class="case2">Samedi</div>
          <div class="case">Matin</div>
          <div id="lunMat" class="case"></div>
          <div id="marMat" class="case"></div>
          <div id="merMat" class="case"></div>
          <div id="jeuMat" class="case"></div>
          <div id="venMat" class="case"></div>
          <div id="samMat" class="case2"></div>
          <div class="case3">Aprem</div>
          <div id="lunAprem" class="case3"></div>
          <div id="marAprem" class="case3"></div>
          <div id="merAprem" class="case3"></div>
          <div id="jeuAprem" class="case3"></div>
          <div id="venAprem" class="case3"></div>
          <div id="samAprem"></div>
        </div>


          <button type="button" onclick="openPriseRDV()" style="background-color: #80008040;
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

        <div id="lun8" class="case" onclick="">08:00</div>
        <div id="mar8" class="case">08:00</div>
        <div id="mer8" class="case">08:00</div>
        <div id="jeu8" class="case">08:00</div>
        <div id="ven8" class="case">08:00</div>
        <div id="sam8" class="case2">08:00</div>

        <div id="lun9" class="case">09:00</div>
        <div id="mar9" class="case">09:00</div>
        <div id="mer9" class="case">09:00</div>
        <div id="jeu9" class="case">09:00</div>
        <div id="ven9" class="case">09:00</div>
        <div id="sam9" class="case2">09:00</div>

        <div id="lun10" class="case">10:00</div>
        <div id="mar10" class="case">10:00</div>
        <div id="mer10" class="case">10:00</div>
        <div id="jeu10" class="case">10:00</div>
        <div id="ven10" class="case">10:00</div>
        <div id="sam10" class="case2">10:00</div>

        <div id="lun11" class="case">11:00</div>
        <div id="mar11" class="case">11:00</div>
        <div id="mer11" class="case">11:00</div>
        <div id="jeu11" class="case">11:00</div>
        <div id="ven11" class="case">11:00</div>
        <div id="sam11" class="case2">11:00</div>

        <div id="lun12" class="case">12:00</div>
        <div id="mar12" class="case">12:00</div>
        <div id="mer12" class="case">12:00</div>
        <div id="jeu12" class="case">12:00</div>
        <div id="ven12" class="case">12:00</div>
        <div id="sam12" class="case2">12:00</div>

        <div id="lun14" class="case">14:00</div>
        <div id="mar14" class="case">14:00</div>
        <div id="mer14" class="case">14:00</div>
        <div id="jeu14" class="case">14:00</div>
        <div id="ven14" class="case">14:00</div>
        <div id="sam14" class="case2">14:00</div>

        <div id="lun15" class="case">15:00</div>
        <div id="mar15" class="case">15:00</div>
        <div id="mer15" class="case">15:00</div>
        <div id="jeu15" class="case">15:00</div>
        <div id="ven15" class="case">15:00</div>
        <div id="sam15" class="case2">15:00</div>

        <div id="lun16" class="case">16:00</div>
        <div id="mar16" class="case">16:00</div>
        <div id="mer16" class="case">16:00</div>
        <div id="jeu16" class="case">16:00</div>
        <div id="ven16" class="case">16:00</div>
        <div id="sam16" class="case2">16:00</div>

        <div id="lun17" class="case3">17:00</div>
        <div id="mar17" class="case3">17:00</div>
        <div id="mer17" class="case3">17:00</div>
        <div id="jeu17" class="case3">17:00</div>
        <div id="ven17" class="case3">17:00</div>
        <div id="sam17" style="border: 2px solid #800080;">17:00</div>

      </div>


    </div>




      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
