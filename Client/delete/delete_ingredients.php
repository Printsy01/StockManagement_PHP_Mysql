<?php 
       require '../serveur.php' ;

       $id = $_GET['id_r'] ;

    //    var_dump($_GET);
try{

    $del = $pdo->exec("DELETE FROM ingredients WHERE ingredient_id = '$id' ") ;
    
    header("Location: http://192.168.43.36/gestion_com/client/menu.php");
}catch(Exception $e){
    echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}
?>
