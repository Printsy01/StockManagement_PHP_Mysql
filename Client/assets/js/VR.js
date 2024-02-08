var subm = document.getElementById("sub");
subm.disabled = true;

function test(){
    var num = document.getElementById("num").value;
    var r = num.search(",");

    if(r != -1){
       var num = num.replace(",", ".");
    }
    
    var numb = parseFloat(num);

    if(numb > 0){
        subm.disabled = false;
    } else {
        subm.disabled = true;
    }
}

document.getElementById("sub").addEventListener("click" , check);
function check(){
    var num = document.getElementById("num").value;
    var r = num.search(",");

    if(r != -1){
       var numa = num.replace(",", ".");
       document.getElementById("num").value = parseFloat(numa);
    }
}
