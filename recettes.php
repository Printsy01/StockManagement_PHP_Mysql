<?php 
require 'serveur.php'; 
session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 

if(isset($_SESSION['ide'])) {

    $ide = $_SESSION['ide'];
 
    session_abort();

} else {
    $ide = $_GET['id_recet'];
}

    $don = ("SELECT * FROM ingredients");
    $recette=$pdo->query($don);

$rct = $pdo->prepare("SELECT * FROM recettes");
$rct->execute();
$recettea = $rct->fetchAll();

foreach($recettea as $larecette)
{
    if($larecette["id_recette"] == $ide) {
        $recettes = $larecette["recette_nom"];
    }
}

$show =("SELECT * FROM contenants 
INNER JOIN ingredients ON contenants.ingredient_id = ingredients.ingredient_id 
WHERE recette_id ='$ide'");
$cont = $pdo->query($show);

$rece = ("SELECT * FROM recettes");
$rect=$pdo->query($rece);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recette</title>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome_all.css">
</head>
<body>
<section class="page">
            <aside>
        <div class="search">
            <input type="search" name="" id="" placeholder="Search">
            <br><br>
            <div class = "rowR">
            <h1 class="titre1">Vos recettes</h1>
            </div>
            
        </div>

        <nav class="nav1">
            <ul>
<?php while($row = $rect->fetch(PDO::FETCH_ASSOC)) : ?>
  <li><a href="recettes.php?id_recet=<?php echo $row['id_recette']; ?>"><?php echo $row['recette_nom']; ?></a></li>
<?php endwhile; ?>
            </ul>
        </nav>
            </aside> 
            <section class="middle">
                <header>
                    <nav class="nav2">
                <div class="onglets">
                    <a href="menu.php">Menu</a>
                <a href="ingredients.php">Les ingredients</a>
                    <a href="ajout_recette.php">Ajouter une recette</a>
                </div>
                <div class="onglet">
                    <img src="assets/img/balance.gif" width="50px">
                </div>

                    </nav>
                </header>
<div class="main">
La recette : <?php echo $recettes; ?><br>
<select name="ingr" id="ingr">
<?php while($row = $recette->fetch(PDO::FETCH_ASSOC)) : ?>
        <option value="<?php echo $row['ingredient_id']; ?>"><?php echo $row['ing_nom']; ?></option>
<?php endwhile; ?>
    </select>
    <input type="number" name="qtee" id="qtee" width="20px"><br>
    <button onclick = "ajoutL()">Choisir</button>
    <br>
    <div class="form">       
        <table id="ingt" class="table table-hover" style="background-color: rgba(255,255,255,0.7);">
            <thead>
                <tr>
                    <th>Les ingrédients</th>
                    <th>Quantités</th>
                    <th>unity</th>
                </tr>
            </thead>
            
        <tbody>
        <?php while($row = $cont->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['ing_nom']; ?></td>
                <td><?php echo $row['qtee']; ?></td>
                <?php
    if($row['ingredient_id'] == 1 || $row['ingredient_id'] == 2 || $row['ingredient_id'] == 3)
    {
        ?>
        <td>kg</td>
        <?php
    }
    ?>

                
            </tr>
            <?php endwhile; ?>
    </tbody>
</div>
</table>

<button><a href="#" onclick="sure(<?php echo $ide; ?>)">Supprimer la recette</a></button>
</div>
</div>
</section>

</body>
<script>
function checkForm() {
  var nom = document.forms["myForm"]["rec"].value;
      nb = document.forms["myForm"]["nombre"].value;
      
      if(nom == "" || nb == "") {
        alert("Veuillez tout remplir");
        return false;
      }

}

function sure(var1) {
    if(confirm("Sure ?")){
        window.location.href = "delete_recette.php?id_r=" + var1;
    }
}
</script>
</html>
<?php 





?>