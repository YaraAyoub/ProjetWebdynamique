
let co = "test";
function setCo(emailProfil){

    co = "test2";
}

function getCo(){

    document.getElementById("titreA").innerHTML += co;
}


function dropDownDoc() {
  var x = document.getElementById("myLinks1");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function dropDownSpe() {
  var x = document.getElementById("myLinks2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function dropDownLab() {
    var x = document.getElementById("myLinks3");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

let data2;
function openForm(data) {

    console.log(data);

    document.getElementById("photodoc").src = "PhotoProfils/"+data["Image"];

   document.getElementById("namedoc").innerHTML = "Dr. "+data["Prenom"]+" "+data['Nom'];
   document.getElementById("spedoc").innerHTML = data["Specialiste"].charAt(0).toUpperCase() + data["Specialiste"].slice(1);
   document.getElementById("infodoc").innerHTML = "Bureau : "+data["Bureau"]+" <br>"+
                                                   "Adresse: "+data["Adresse"]+"<br>"+
                                                   "DigiCode: "+data["DigiCode"]+" <br><br>"+
                                                   "Telephone : "+data["Telephone"]+" <br>"+
                                                   "mail : "+data["Email"]+" <br>";

   document.getElementById("popupForm").style.display = "block";
   document.getElementById("pagePopup").style.display = "block";

   //document.getElementById("boutonRDV").onclick = openPriseRDV;

   data2 = data;
 }


function openPriseRDV() {

  document.getElementById("priseRDVnomDoc").innerHTML += "Dr. "+data2["Prenom"]+" "+data2['Nom'];
  document.getElementById("priseRDVspeDoc").innerHTML = data2["Specialiste"].charAt(0).toUpperCase() + data2["Specialiste"].slice(1);

   document.getElementById("popupForm").style.display = "none";
   document.getElementById("pagePopup").style.display = "none";
   document.getElementById("section2").style.display = "none";
   document.getElementById("priseRDV").style.display = "block";
}




  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("pagePopup").style.display = "none";
  }

  function openFormCo() {
    document.getElementById("popupFormCo").style.display = "block";
    document.getElementById("popupCo").style.display = "block";
  }

  function closeFormCo() {
    document.getElementById("popupFormCo").style.display = "none";
    document.getElementById("popupCo").style.display = "none";
  }

  function openFormInsc() {
    document.getElementById("popupFormCo").style.display = "none";
    document.getElementById("popupCo").style.display = "none";
    document.getElementById("popupInsc").style.display = "block";
  }

  function closeFormInsc() {
    document.getElementById("popupFormCo").style.display = "none";
    document.getElementById("popupInsc").style.display = "none";
  }


  function drdispo(elemId){
    document.getElementById(elemId).style.background = "none";
  }

  function drPasdispo(elemId){
    document.getElementById(elemId).style.background = "#666";
  }



  function clickSuppRdv(){
    var result ="<?php SuppRdv(); ?>"
    document.write(result);
  }

function showSecretData(elemId) {
  var x = document.getElementById(elemId);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function noConnexion(){
  document.getElementById("noconnexion").style.display = "block";
}

function initPopupConnexion(){
  document.getElementById("noconnexion").style.display = "none";
}
