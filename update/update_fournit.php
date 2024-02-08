<?php    
    require '../serveur.php';

try{

    if(isset($_POST["ingqte"]) and isset($_POST["ingname"])) {
        extract($_POST);
		$update = $pdo->prepare("UPDATE fournitures SET fournitures_name =?, qty=?, rayon=?,unity =? WHERE fournitures_id =?");
		$update->execute(array($ingname , $ingqte ,$ray, $u , $ingid));
        
		header("Location: http://192.168.43.36/gestion_com/fournitures.php");
	}
    
} catch(Exception $e){
    echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}
?>