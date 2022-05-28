/*
let co = "test";
function setCo(emailProfil){

    co = "test2";
}

function getCo(){

    document.getElementById("titreA").innerHTML += co;
}
*/

// afficher les docteurs généraliste tout parcourir
function dropDownDoc() {
  var x = document.getElementById("myLinks1");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

// afficher les specialité tout parcourir
function dropDownSpe() {
  var x = document.getElementById("myLinks2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

// afficher les services du laboratoire tout parcourir
function dropDownLab() {
    var x = document.getElementById("myLinks3");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

//affichage info d'un doc
let data2, dlibre, dnonlibre;
function openForm(data, libre, nonlibre) {

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

   document.getElementById("choixDocRDV").value = data['Nom'] ;

   data2 = data;
   dlibre = libre;
   dnonlibre = nonlibre;
 }

//remplir calendrier d'un service du labo
function calendrierSL(type,libre, nonlibre) {

  dlibre = libre;

    console.log(dlibre);
  dnonlibre = nonlibre;

  for(let i=0;i<dlibre.length;i++){
    document.getElementById(dlibre[i]).style.background = "none" ;
  }

  for(let i=0;i<dnonlibre.length;i++){
    document.getElementById(dnonlibre[i]).style.background = "purple" ;
    document.getElementById(dnonlibre[i]).style.cursor = "not-allowed" ;
      document.getElementById(dnonlibre[i]).onclick = "" ;
  }

  document.getElementById("choixLabRDV").value = type ;
}


function showDocSpe(spe){

  document.getElementById("choixSpe").value = spe ;
  document.submitSpe.submit() ;

}

function showServiceLab(service, idService){

  console.log(service);

  document.getElementById("choixService").value = service ;
  document.getElementById("choixIdService").value = idService ;
  document.submitService.submit() ;

}

function openPriseRDV() {

  document.getElementById("priseRDVnomDoc").innerHTML += "Dr. "+data2["Prenom"]+" "+data2['Nom'];
  document.getElementById("priseRDVspeDoc").innerHTML = data2["Specialiste"].charAt(0).toUpperCase() + data2["Specialiste"].slice(1);

  for(let i=0;i<dlibre.length;i++){
    document.getElementById(dlibre[i]).style.background = "none" ;
  }

  for(let i=0;i<dnonlibre.length;i++){
    document.getElementById(dnonlibre[i]).style.background = "purple" ;
    document.getElementById(dnonlibre[i]).style.cursor = "not-allowed" ;
      document.getElementById(dnonlibre[i]).onclick = "" ;
  }

   document.getElementById("popupForm").style.display = "none";
   document.getElementById("pagePopup").style.display = "none";
   document.getElementById("section2").style.display = "none";
   document.getElementById("priseRDV").style.display = "block";
   document.getElementById("submitChoixRDV").style.display = "block";
}

function openCV() {

  document.getElementById("CVnomDoc").innerHTML += "Dr. "+data2["Prenom"]+" "+data2['Nom'];
  document.getElementById("CVspeDoc").innerHTML = data2["Specialiste"].charAt(0).toUpperCase() + data2["Specialiste"].slice(1);


   document.getElementById("popupForm").style.display = "none";
   document.getElementById("pagePopup").style.display = "none";
   document.getElementById("section2").style.display = "none";
   document.getElementById("monCv").style.display = "block";
   document.getElementById("submitChoixRDV").style.display = "none";
}

function takeResa(choix){

  for(let i=0;i<dlibre.length;i++){
    document.getElementById(dlibre[i]).style.background = "none" ;
  }

  for(let i=0;i<dnonlibre.length;i++){
    document.getElementById(dnonlibre[i]).style.background = "purple" ;
    document.getElementById(dnonlibre[i]).style.cursor = "not-allowed" ;
    document.getElementById(dnonlibre[i]).onclick = "" ;
  }

  document.getElementById(choix).style.background = "gray" ;
  document.getElementById("choixDateRDV").value = choix ;


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
