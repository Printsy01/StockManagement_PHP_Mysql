var ligne = document.getElementById("ingt").rows;
longueur = ligne.length;

for(i=0;i<largeur;i++)
{
    var column = ligne[1].cells;
    var largeur = column.length;
    var qte = document.getElementById("valeur").value;
    if(qte < 5) {
        var valeur = document.getElementById("valeur");
        $("#valeur").addClass("bg bg-warning");
    }
}

// function check() {
//     var Ip = document.getElementById("rct").value;
//     var Ip1 = document.getElementById("qty").value;
//     var btn = document.getElementById("btn1");

//     if(Ip == "" || Ip1 == "" || Ip1 <= 0 ){
//         btn.disabled = true;
//     } else {
//         btn.disabled = false;
//     }
// }

function searchfunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue,j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td");
      for(j=0;j<td.length;j++){
        if(td[j]){
          txtValue = td[j].textContent || td[j].innerText;
          txtValue= txtValue.toUpperCase();
           if (txtValue.indexOf(filter) > -1) {
            tr[i].style.display = "";
            break;
           }else {
          tr[i].style.display = "none";
        }
      
        }
      }
     
    
  }
}

