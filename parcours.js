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

  function openForm(name) {

   document.getElementById("namedoc").innerHTML = name;

   document.getElementById("popupForm").style.display = "block";
   document.getElementById("pagePopup").style.display = "block";
 }
/*
  function openForm() {
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("pagePopup").style.display = "block";
  }
*/
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
