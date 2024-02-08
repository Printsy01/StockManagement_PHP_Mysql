<?php
    require '../serveur.php';
    // var_dump($_POST);

    session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 
	if(isset($_POST["ing"]) && isset($_POST["qta"]) && isset($_POST["u"])) {
		extract($_POST);

$rct = $pdo->prepare("SELECT * FROM ingredients");
$rct->execute();
$recettea = $rct->fetchAll();

foreach($recettea as $larecette)
{
    if($larecette["ing_nom"] == $ing) {
        $igt = $larecette["ingredient_id"];
    }
}
try{
	$getdata = $pdo->prepare("INSERT INTO contenants(ingredient_id ,recette_id,qtee,unity) VALUES (?,?,?,?)");
	$getdata->execute(array($igt , $ide ,$qta ,$u ));
	header("Location: http://192.168.43.36/gestion_com/VraiRecettes.php?id_recet=".$ide);
}catch(Exception $e){
	echo "<script language='javascript'>";
	echo "alert('Erreur')";
    echo "</script>";
    
}

	}
?>

<!DOCTYPE html>
<html lang="en">
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #f3f3f3;
}

.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 150px;
  display: flex;
  flex-direction: column;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}

.sary{
    text-align: center;
    padding: 25px;
}

button {
    padding: 10px;
    background-color: #1a1a1a;
    color: white;
}
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deleting...</title>
</head>
<body>
<div class="wrapper">
    <h6 style="text-align: center;">Opération échouée !</h6>
    <!-- <img src="../assets/img/tick-tick-verified.gif" alt="" class="sary"> -->
    <button onclick="redirect(<?php echo $ide; ?>);">Revenir</button>
</div>
</body>

<script>
function redirect(myvar) {
    window.location.href = "../VraiRecettes.php?id_recet=" + myvar;
}
</script>

</html>