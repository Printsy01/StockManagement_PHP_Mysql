<?php
    require 'serveur.php';

    $ide = $_GET['idde'];
    date_default_timezone_set("Indian/Antananarivo");
    $h = date("Y-m-d H:i:s");

$calc = $pdo->prepare("SELECT * FROM contenants WHERE recette_id = '$ide'");
$calc->execute();
$calcul = $calc->fetchAll();

$cal = $pdo->prepare("SELECT * FROM contenants INNER JOIN recettes ON contenants.recette_id = recettes.id_recette");
$cal->execute();
$c = $cal->fetchAll();
    
foreach($c as $r) {
    if($r['id_recette'] == $ide){
        $recet = $r['recette_nom'];
    }
}

$ingredient = $pdo->prepare("SELECT * FROM ingredients");
$ingredient->execute();
$ingredients = $ingredient->fetchAll();

$i = 0;
$j = 0;

foreach($calcul as $in)
    {
    foreach($ingredients as $all)
        {
            if($in['ingredient_id'] == $all['ingredient_id']) {
                $up = $all['qte'];
                $down = $in['qtee'];
                $res = $up - $down;
                if($res > 0){                     
                    $i++;
                } 
                $j++;
            }   
        }
    }

if($i == $j){

    foreach($calcul as $in)
    {
        foreach($ingredients as $all)
        {
            if($in['ingredient_id'] == $all['ingredient_id']) {
                $up = $all['qte'];
                $down = $in['qtee'];
                $res = $up - $down;
                if($res > 0){                     
                    $setdata = $pdo->prepare("UPDATE ingredients SET qte = ? WHERE ingredient_id = ?");
                    $setdata->execute(array($res , $all['ingredient_id']));
                } 
            }   
        }
    }   
        $getdata = $pdo->prepare("INSERT INTO historique(recette_nom , date) VALUES(?,?) ");
        $getdata->execute(array($recet , $h)); 
        header("Location: success.php");
} else {
    header("Location: recettes1.php?check=".urlencode(0));
}
    
    
?>