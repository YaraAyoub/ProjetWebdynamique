<?php session_start();
/*
  if(empty($_SESSION['email']))
  {
      header("Location: popupConnexion.php");
  }
*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
     <title>Omnes Santé</title>
     <link href="index.css" rel="stylesheet" type="text/css" />
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


      <div id="section">

        <div>
          <div class="carousel">
            <ul class="slides">

              <input type="radio" name="radio-buttons" id="img-1" checked />
              <li class="slide-container">
                <div class="slide-image">

                  <img src="lab.jpg">

                </div>

                <div class="carousel-controls">
                  <label for="img-3" class="prev-slide">
                    <span>&lsaquo;</span>
                  </label>
                  <label for="img-2" class="next-slide">
                    <span>&rsaquo;</span>
                  </label>
                </div>
              </li>

              <input type="radio" name="radio-buttons" id="img-2" />
              <li class="slide-container">
                <div class="slide-image">
                  <img src="vaccin.jpg">
                </div>
                <div class="carousel-controls">
                  <label for="img-1" class="prev-slide">
                    <span>&lsaquo;</span>
                  </label>
                  <label for="img-3" class="next-slide">
                    <span>&rsaquo;</span>
                  </label>
                </div>
              </li>
              <input type="radio" name="radio-buttons" id="img-3" />
              <li class="slide-container">
                <div class="slide-image">
                  <img src="assistant.jpg">
                </div>
                <div class="carousel-controls">
                  <label for="img-2" class="prev-slide">
                    <span>&lsaquo;</span>
                  </label>
                  <label for="img-1" class="next-slide">
                    <span>&rsaquo;</span>
                  </label>
                </div>
              </li>
              <div class="carousel-dots">
                <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
                <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
                <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
              </div>
            </ul>
          </div>

          <div id="chiffreCle">
            <h2 style="text-align:center">Bienvenue sur OMNES Santé !</h2>
            <p>Votre plateforme pour prendre un rendez-vous médical pour la communauté Omnes Education</p>


        </div>

        <img src="imagesDeco/AcHILd.png" alt="photo dr" width="700" height="500" style="float:right;margin-top:30px;border-radius:120px;">
        <img src="imagesDeco/coeur.png" alt="photo dr" width="700" height="500" style="margin-top:30px;border-radius:120px;">
        <img src="imagesDeco/teamdoc.png" alt="photo dr" width="700" height="500" style="float:right;margin-top:30px;border-radius:120px;">
        <img src="imagesDeco/microscope.png" alt="photo dr" width="700" height="500"style="margin-top:30px;border-radius:120px;">




      </div>



      <div id="footer">
        <p>
          Copyright &copy; 2022, Omnes Santé<br><br>
          <a href="mailto:omnes.sante@gmail.com">omnes.sante@gmail.com</a>
        </p>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.081761528267!2d2.2863111515249366!3d48.87571787604028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66ff2e51e5f8b%3A0xd1996d079d18a7cd!2s59%20Av.%20de%20la%20Grande%20Arm%C3%A9e%2C%2075116%20Paris!5e0!3m2!1sfr!2sfr!4v1653816525128!5m2!1sfr!2sfr" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      </div>

    </div>

  </body>
</html>
