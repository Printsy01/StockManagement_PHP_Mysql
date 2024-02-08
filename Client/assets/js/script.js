const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
// const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
// submitBtn.addEventListener("click", function(){
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;

// });

prevBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
// prevBtnFourth.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-50%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });

var i = 0;
function ajoutL() {
  ajoutl() ;
  form();
}

function ajoutl() {
var table = document.getElementById("table");
  var ligne = table.insertRow(-1);

  
  var colonne1 = ligne.insertCell(0);
  colonne1.innerHTML += $("#ing").val() ;

  var colonne2 = ligne.insertCell(1);
  colonne2.innerHTML += document.getElementById("qte").value ;

  var colonne4 = ligne.insertCell(2);
  colonne4.innerHTML += document.getElementById("u").value;

}

function form() {
var recette = document.getElementById("ing").value;
var first = document.getElementById("qte").value;
var qtee = checkChoix(first);
var unit = document.getElementById("u").value;
var page = document.getElementById("pg");

var rct = document.createElement("input");
rct.value = recette ;
page.appendChild(rct);

var qty = document.createElement("input");
qty.value = qtee;
page.appendChild(qty);

var uty = document.createElement("input");
uty.value = unit;
page.appendChild(uty);

qty.name = "quantity"+""+i;
rct.name = "ingredient" +"" +i ;
uty.name = "unit" + "" + i; 

qty.style.display = "none";
rct.style.display = "none";
uty.style.display = "none";

var n = document.createElement("input");
n.value = i;
page.appendChild(n);
n.name = "nombre";
n.style.display = "none";

i++ ;

}

function checkChoix(myVar){
  var r = myVar.search(",");
  var res = 0;  

  if(r != -1){
     var numa = num.replace(",", ".");
     res = parseFloat(numa);
  } else {
     res = parseFloat(myVar);
  }

  return res;
}