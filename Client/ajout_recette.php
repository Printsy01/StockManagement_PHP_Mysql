<?php 
    require 'serveur.php';

    $don = ("SELECT * FROM ingredients");
    $recette=$pdo->query($don);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <style>
  .cscrol{
    overflow: scroll;
    max-height: 300px;
  }
  </style>
  <head>
    <meta charset="utf-8">
    <title>Ajout d'une recette</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="container">
      <header>Signup Form</header>
      <div class="progress-bar">
        <div class="step">
          <p>La recette</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Les Ingrédients</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Validation</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        
      </div>
      <div class="form-outer">
        <form action="ajout_recette_suite.php" method="POST" onsubmit="return checkForm()">
          <div class="page slide-page">
            <div class="title">Nouvelle recette :</div>
            <div class="field">
              <input oninput="f1check()" type="text" id="rec" name="rec">
            </div>
           
            <div class="field">
              <button class="firstNext next" id="fN">Next</button>
            </div>
            <div class="field">
              <button  class="fN"> <a href="recettes1.php" style="text-decoration:none; color:white;"> Fermer</a></button>
            </div>
          </div>

          <div class="page" id="pg">
            
          <div class="cscrol">
            <div class="title">Les Ingrédients:</div>
            <div class="field1">
            <select name="" id="ing">
            <?php while($row = $recette->fetch(PDO::FETCH_ASSOC)) : ?>
        <option value="<?php echo $row['ing_nom']; ?>"><?php echo $row['ing_nom']; ?></option>
            <?php endwhile; ?>
            </select>
            
            
            <input type="text" onkeyup="pasVirgule(this)" placeholder="qte" id="qte" width="10%">
            <select name="" id="u">
              <option value="kg">kg</option>
              <option value="litre">litre</option>
              <option value="pieces">pieces</option>
              <option value="pieces">btte</option>
            </select>
            <button type="button" id="btn1" style="margin-top: -1px; margin-left: 5px; " onclick = "ajoutL()" >Choisir</button>
            
            </div>
            <div class="contain">
            <table id="table" class="tab" border="1">
              <tr>
                <td>Ingrédients</td>
                <td>Quantity</td>
                <td>Unit</td>
              </tr>
            </table>
          </div>
          </div>
            <div class="field btns">
              <button class="prev-1 prev">Previous</button>
              <button class="next-1 next">Next</button>
            </div>
          </div>

          <div class="page">
            <p>La nouvelle recette <span id="recette"></span> sera ajouté ?</p>
            <input type="image" src="assets/img/check-mark-verified.gif" alt="">
            <div class="field btns">
              <button class="prev-2 prev">Previous</button>
              <button class="submit" type="submit">Submit</button>
            </div>
          </div>

          <div class="page" style="{display: none;}">
            <div class="title">Login Details:</div>
            <div class="field">
              <div class="label">Username</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Password</div>
              <input type="password">
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Previous</button>
              <button class="next-2 next">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- <script src="assets/js/valid.js"></script> -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery.min.js"></script>

<script>
var subm = document.getElementById("btn1");
subm.disabled = true;

function test(){
    var num = document.getElementById("qte").value;
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

var btn = document.getElementById("fN");
btn.disabled = true;
document.getElementById("rec").addEventListener("input" , checka);

function checka() {
    var text = document.getElementById("rec").value;
    if(text != ""){
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}

function pasVirgule(obj){

obj.value=obj.value.replace(/[^0-9,.]/g,'');
obj.value=obj.value.replace(/,/g,'.');

}

</script>
  </body>

</html>
