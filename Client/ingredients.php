<?php 
require 'serveur.php';    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
    <input type="text" name="ing" placeholder="ingredients"><br>
    <input type="text" name="qte" placeholder="quantity"><br>
    <input type="submit" value="Ok">
    </form>
<a href="menu.php">Voir les recettes</a>
</body>
<script>

</script>
</html>
<?php 
if(isset($_GET["ing"]) and isset($_GET["qte"])) {
    extract($_GET);
    $getdata = $pdo->prepare("INSERT INTO ingredients(ing_nom , qte) VALUES (?,?)");
    $getdata->execute(array($ing,$qte));
}  


?>