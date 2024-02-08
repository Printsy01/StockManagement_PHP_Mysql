check();
f1check();

function check() {
    var qt = parseFloat(document.getElementById("qte").value);
    var btn = document.getElementById("btn1");

    if(qt <= 0 || qt == "") {
      btn.disabled = true;
    } else {
      btn.disabled = false;
    }
}

function f1check() {
    var rec = document.getElementById("rec").value;
    var btn2 = document.getElementById("fN");

    if(rec == "") {
      btn2.disabled = true;
    } else {
      btn2.disabled = false;
    }
}