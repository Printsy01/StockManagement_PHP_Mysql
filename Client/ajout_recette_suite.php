<?php 
    require 'serveur.php';
    var_dump($_POST);

    $ingt = ("SELECT * FROM ingredients");
    $ingred = $pdo->query($ingt);
    $res = $ingred->fetchAll();


    try{

        if(isset($_POST["rec"]) && isset($_POST["nombre"])){
            extract($_POST);
            $insertRecette = $pdo->prepare("INSERT INTO recettes(recette_nom) VALUES (?)");
            $insertRecette->execute(array($rec));
            $idRecette = $pdo->lastInsertId();
            
            
            
            switch($nombre) {
                case 28 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient28) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity28,$idRecette,$unit28));
                    }
                }

                case 27 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient27) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity27,$idRecette,$unit27));
                    }
                }

                case 26 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient26) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity26,$idRecette,$unit26));
                    }
                }

                case 25 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient25) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity25,$idRecette,$unit25));
                    }
                }

                case 24 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient24) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity24,$idRecette,$unit24));
                    }
                }

                case 23 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient23) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity23,$idRecette,$unit23));
                    }
                }

                case 22 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient22) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity22,$idRecette,$unit22));
                    }
                }

                case 21 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient21) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity21,$idRecette,$unit21));
                    }
                }

                case 20 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient20) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity20,$idRecette,$unit20));
                    }
                }
                
                case 19 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient19) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity19,$idRecette,$unit19));
                    }
                }
                
                case 18 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient18) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity18,$idRecette,$unit18));
                    }
                }
                
                case 17 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient15) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity17,$idRecette,$unit17));
                    }
                }
                
                case 16 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient16) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity16,$idRecette,$unit16));
                    }
                }
                
                case 15 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient15) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity15,$idRecette,$unit15));
                    }
                }
                
                case 14 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient14) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity14,$idRecette,$unit14));
                    }
                }
                
                case 13 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient13) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity13,$idRecette,$unit13));
                    }
                }
                
                case 12 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient12) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity12,$idRecette,$unit12));
                    }
                } 
                
                case 11 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient11) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity11,$idRecette,$unit11));
                    }
                }
                
                case 10 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient10) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity10,$idRecette,$unit10));
                    }
                }
                case 9 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient9) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity9,$idRecette,$unit9));
                    }
                }
                case 8 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient8) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity8,$idRecette,$unit8));
                    }
                }
                case 7 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient7) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity7,$idRecette,$unit7));
                    }
                }
                case 6 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient6) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity6,$idRecette,$unit6));
                    }
                }
                case 5 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient5) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity5,$idRecette,$unit5));
                    }
                }
                case 4 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient4) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity4,$idRecette,$unit4));
                    }
                }
                case 3 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient3) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity3,$idRecette,$unit3));
                    }
                }
                case 2 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient2) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity2,$idRecette,$unit2));
                    }
                }
                case 1 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient1) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity1,$idRecette,$unit1));
                    }
                }
                case 0 :
                foreach($res as $it)
                {
                    if($it['ing_nom'] == $ingredient0) 
                    {   
                        $iD = $it['ingredient_id'];
                        $insertContent = $pdo->prepare("INSERT INTO contenants(ingredient_id,qtee,recette_id,unity) VALUES (?,?,?,?)");
                        $insertContent->execute(array($iD,$quantity0,$idRecette,$unit0));
                    }
                }
                break;
            }
            header("Location: http://localhost/gestion_com/recettes1.php");
        }        

    } catch(Exception $e){
        header("Location: http://localhost/gestion_com/Client/false.php");
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
    <title>Inserting...</title>
</head>
<body>
<div class="wrapper">
    <h6 style="text-align: center;">Opération échouée !</h6>

    <button onclick = "redirect()">Revenir au menu</button>
</div>
</body>
<script>
function redirect() {
    location.replace("menu.php");
}
</script>
</html>
