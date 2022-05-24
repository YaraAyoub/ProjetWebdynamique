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
          <a href="recherche.html"><button class="button">Recherche</button></a>
          <a href="parcourir.php"><button class="button">Tout Parcourir</button></a>
          <a href="index.html"><button class="button">Accueil</button></a>

        </div>
      </div>


      <div id="section">

<div id="section2">

        <div class="topnav">
          <a href="#home" class="active">Médecine générale</a>
          <div id="myLinks1">

<!--TODO-->
        <?php
        $doc = "Dr machin";
        echo("<a onclick=\"openForm()\">$doc</a>");
        echo("<a onclick=\"openForm()\">Dr truc</a>");
        echo("<a onclick=\"openForm()\">Dr bidule</a>");
        ?>

        </div>

        <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
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

          <a href="javascript:void(0);" class="icon" onclick="myFunction2()">
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

            <a href="javascript:void(0);" class="icon" onclick="myFunction3()">
            <i class="fa fa-chevron-down"></i>

            </a>
          </div>

    </div>
</div>

    <div class="login-popup">
      <div class="form-popup" id="popupForm" onclick="closeForm()">

      </div>

      <div class="form-container" id="pagePopup">


        <h2>Veuillez vous connecter</h2>

        <button type="button" class="btn cancel" onclick="closeForm()">X</button>
      </div>
    </div>


    <div class="login-popup">
      <div class="form-popup" id="popupFormCo" onclick="closeFormCo()">

      </div>

      <form action="/action_page.php" class="form-container-connexion" id="popupCo">
        <h2 style="margin-top: 50px;margin-bottom: 25px;">J'ai déjà un compte OMNES Santé</h2>

        <input type="text" id="email" placeholder="Adresse email" name="email" required=""
          style="margin-bottom: 20px;padding-right: 64px;padding-top: 8px;padding-bottom: 8px;font-size: 15px;">

          <input type="password" id="psw" placeholder="Mot de passe" name="psw" required="" style="margin-bottom: 20px;
                    padding-right: 64px;
                    padding-top: 8px;
                    padding-bottom: 8px;
                    font-size: 15px;">
        <button type="submit" class="btn co">Connexion</button>
        <button type="button" class="btn cancel" onclick="closeFormCo()">X</button>

        <h2 style="margin-top: 40px;
          font-size: 0.9em;">Nouveau sur OMNES Santé ?
        </h2>

        <button type="button" class="btn insc">S'inscrire</button>

      </form>
    </div>


      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>



  </body>
</html>
