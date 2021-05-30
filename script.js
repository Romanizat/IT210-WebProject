var slideIndex = 0;
function slideshow(){
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(slideshow, 7000); 
}

var audio = document.getElementById("myAudio");

function playAudio() {
  audio.play();
}

function pauseAudio(){
  audio.pause();
}


function proveraContact (){
  var ime = document.forms[0].elements["ime"].value;
  var prezime = document.forms[0].elements["prezime"].value;
  var naslov = document.forms[0].elements["msgSubject"].value;
  var poruka = document.forms[0].elements["msg"].value;
  var fon = document.forms[0].elements["fon"].value;

  if(ime.includes(" ") || sadrziBroj(ime) || ime==""){
      window.alert("Ime ne sme biti prazno, sadržati razmake ili brojeve.");
      return false;
  }else if(prezime.includes(" ") || sadrziBroj(prezime) || prezime==""){
      window.alert("Prezime ne sme biti prazno, sadržati razmake ili brojeve.");
      return false;
  }else if(naslov == ""){
      window.alert("Naslov ne sme biti prazan.");
      return false;
  }else if(poruka.length<5){
      window.alert("Poruka mora imati bar 5 karaktera.");
      return false;
  }else if(poruka.length>255){
      window.alert("Poruka mora biti manja od 255 karaktera.");
      return false;
  }else if(fon.charAt(0)!="+"){
      window.alert("Broj telefona mora početi znakom '+'");
      return false;
  }else if(!fonProvera(fon)){
      window.alert("Broj telefona mora sadržati samo cifre nakon znaka '+'");
      return false;
  }else if(document.getElementsByName("opcije").value=="null"){
      window.alert("Morate izabrati kome biste uputili poruku!");
      return false;
  }else{
      window.alert("Hvala na poruci!");
      return true;
  }
}

function sadrziBroj(string){
  var niz= [0,1,2,3,4,5,6,7,8,9];
  for(var i=0;i<niz.length;i++){
      if(string.includes(String(niz[i]))){
          return true;
      }
  }
  return false;
}

function fonProvera(string){
  if(string.length<8){
      window.alert("Broj telefona mora imati bar 7 cifara.");
      return false;
  }else if(string.length>20){
      window.alert("Proverite dužinu broja telefona i probajte ponovo.");
      return false;
  }
  for (var i=1; i<string.length;i++){
      if(isNaN(string[i])){
          return false;
      }
  }
  return true;
}

mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; // Safari
  document.documentElement.scrollTop = 0; // Chrome, Firefox, IE and Opera
}