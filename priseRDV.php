<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="priseRDV.css" rel="stylesheet" type="text/css" />
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

          <h1>Prise de RDV avec Dr Bidule MUCHE</h1>
          <h2>Docteur généraliste</h2>

          <div class="grid-container">
            <div class="case4"><strong>Lundi</strong></div>
            <div class="case4"><strong>Mardi</strong></div>
            <div class="case4"><strong>Mercredi</strong></div>
            <div class="case4"><strong>Jeudi</strong></div>
            <div class="case4"><strong>Vendredi</strong></div>
            <div class="case5"><strong>Samedi</strong></div>

            <div id="lun8" class="case">08:00</div>
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
            <div id="sam17">17:00</div>

          </div>


        </div>

      </div>

      <?php
        include ('popupCo.php');
       ?>

      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
