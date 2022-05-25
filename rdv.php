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
          <a onclick="openFormCo()"><button class="button">Votre compte</button></a>
          <a href="rdv.php"><button class="button">RDV</button></a>
          <a href="recherche.php"><button class="button">Recherche</button></a>
          <a href="parcourir.php"><button class="button">Tout Parcourir</button></a>
          <a href="index.php"><button class="button">Accueil</button></a>

        </div>
      </div>


      <div id="section">

        <div id="section2">

                <div class="rdv">
                  <a class="active">blabla</a>

<!--https://www.delftstack.com/fr/howto/php/onclick-php/#utilisez-du-javascript-simple-pour-ex%25C3%25A9cuter-la-fonction-php-avec-l%25C3%25A9v%25C3%25A9nement-onclick -->

                <a href="#home" class="icon" onclick="clickSuppRdv()">
                <i class="fa fa-trash-o"></i>

                <?php

                function SuppRdv(){
                print("supp");
                }
                 ?>

                </a>
                </div>


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

          <h2 style="margin-top: 23px;font-size: 0.9em;">
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
