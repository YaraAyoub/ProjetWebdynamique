<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="logo.jpg" rel="icon" type="images/x-icon" />
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
          <a href="recherche.html"><button class="button">Recherche</button></a>
          <a href="parcourir.php"><button class="button">Tout Parcourir</button></a>
          <a href="index.html"><button class="button">Accueil</button></a>

        </div>
      </div>


      <div id="section">
        <p>hello</p>


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



      </div>

      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
