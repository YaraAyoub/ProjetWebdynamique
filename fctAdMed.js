function ajoutdoc()
{
  document.getElementById("ajout").style.display = "block";
  document.getElementById("supp").style.display = "none";
  document.getElementById("info").style.display = "none";
  document.getElementById("compteA").style.display = "none";

}

function suppdoc()
{
  document.getElementById("ajout").style.display = "none";
  document.getElementById("supp").style.display = "block";
  document.getElementById("info").style.display = "none";
  document.getElementById("compteA").style.display = "none";


}

function info()
{
  document.getElementById("ajout").style.display = "none";
  document.getElementById("supp").style.display = "none";
  document.getElementById("info").style.display = "block";
  document.getElementById("compteA").style.display = "none";

}

function compteA()
{
  document.getElementById("ajout").style.display = "none";
  document.getElementById("supp").style.display = "none";
  document.getElementById("info").style.display = "none";
  document.getElementById("compteA").style.display = "block";

}

function chatroom()
{
  document.getElementById("compteM").style.display = "none";
  document.getElementById("conslt").style.display = "none";
  document.getElementById("chatroom").style.display = "block";
}

function conslt()
{
  document.getElementById("chatroom").style.display = "none";
  document.getElementById("compteM").style.display = "none";
  document.getElementById("conslt").style.display = "block";
}

function compteM()
{
  document.getElementById("ajout").style.display = "none";
  document.getElementById("supp").style.display = "none";
  document.getElementById("compteM").style.display = "block";
}
