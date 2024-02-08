<?php 
       require '../serveur.php' ;

       $id = $_GET['id_r'] ;
       $id1 = $_GET['id_rec'] ;

       var_dump($_GET);
try{

    $del = $pdo->exec("DELETE FROM contenants WHERE ingredient_id = '$id' AND recette_id = '$id1'") ;
    
    header("Location: http://192.168.43.36/gestion_com/VraiRecettes.php?id_recet=".$id1);
}catch(Exception $e){
    echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}
?>
