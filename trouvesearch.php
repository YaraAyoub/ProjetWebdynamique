<?php

session_start();


  $_SESSION['recherche'] = $_POST["Recherche"];


  header("Location: recherche.php")


 ?>
