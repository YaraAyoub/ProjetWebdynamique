<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link href="index.css" rel="stylesheet" type="text/css" />
     <link href="inscription.css" rel="stylesheet" type="text/css" />
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
          <a href="rdv.html"><button class="button">RDV</button></a>
          <a href="recherche.html"><button class="button">Recherche</button></a>
          <a href="parcourir.html"><button class="button">Tout Parcourir</button></a>
          <a href="index.html"><button class="button">Accueil</button></a>

        </div>
      </div>

      <div id="section">

        <div id="section2">

          <h2 style="margin-top: 50px;margin-bottom: 25px;margin-left: 210px;">
            Inscription
          </h2>

            <input type="text" id="nom" placeholder="Nom" name="nom" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="text" id="prenom" placeholder="Prénom" name="prenom" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="text" id="dateNaissance" placeholder="Date de naissance (JJ/MM/AAAA)" name="dateNaissance" required="" style="margin-bottom: 20px;
                padding-right: 18px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;width: 230px;"
            >

            <input type="text" id="adresse" placeholder="Adresse" name="adresse" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >

            <input type="text" id="carteVitale" placeholder="Carte Vitale" name="carteVitale" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >


            <h2 style="margin-top: 40px;font-size: 0.9em;">
              Information de connexion
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

            <h2 style="margin-top: 40px;font-size: 0.9em;">
              Information de paiement
            </h2>

            <input type="text" id="nomCarte" placeholder="Nom sur la carte" name="nomCarte" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="number" id="numCarte" placeholder="Numero de carte" name="numCarte" required=""
              style="margin-bottom: 20px;
                padding-right: 64px;
                padding-top: 8px;
                padding-bottom: 8px;
                font-size: 15px;"
            >
            <input type="number" id="CVV" placeholder="CVV" name="CVV" required="" style="margin-bottom: 20px;
                padding-right: -7px;
                padding-top: 8px;
                padding-bottom: 8px;
                margin-left: 140px;
                margin-right: 170px;
                font-size: 15px;"
            >

            <a href="compte.html">
              <button type="submit" class="btn co" style="background-color: #80008040;
                font-size: large;
                margin-top: 8px;
                margin-left: 220px;
                padding: 10px;
                border: none;
                border-radius: 25px;"
              >Valider</button>
            </a>

        </div>
      </div>

      <div id="footer">Copyright &copy; 2022, Omnes Santé<br>
        <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
      </div>

    </div>

  </body>
</html>
