<!DOCTYPE html>
<html>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
<style>

.topnav {
  background-color: white;
  position: relative;
  margin: 30px;
}
.topnav #myLinks3{
	display:none;
  overflow: auto;
}
#myLinks3 a:hover{
 background-color: #ddd;
  color: black;
}


.topnav a {
  color: black;
  padding: 25px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
  border-radius: 15px;
}

.topnav a.icon {
  background: #190037;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
  color: white;
}

.active {
  background-color: #ddd;
  color: white;
}

</style>

<?php
$txt1 = "laboratoire";

echo("<p>test</p>");
echo("<div class=\"topnav\">");
echo("<a href=\"\" class=\"active\">$txt1</a>");
echo("<div id=\"myLinks3\">
              <a href=\"#PriseDeSang\">Prise de sang</a>
              <a href=\"#ExaminUrine\">Examen de l'urine</a>
              <a href=\"#DepistageCovid\">Dépistage Covid</a>
            </div>");
echo("<a href=\"javascript:void(0);\" class=\"icon\" onclick=\"myFunction3()\">
            <i class=\"fa fa-chevron-down\"></i>");
echo("</div>");

echo("<p>test</p>");

?>


<script>
function myFunction3() {
    var x = document.getElementById("myLinks3");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }

}
</script>

</body>
</html>
