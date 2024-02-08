<?php    
    require '../serveur.php';

try{

	if(isset($_POST["uname"]) and isset($_POST["mdp"]) and isset($_POST["uc"])) {
		extract($_POST);
		$update = $pdo->prepare("UPDATE client SET  nomc=?, mdpc =? , contact = ? WHERE id_client =?");
		$update->execute(array($uname , $mdp , $uc , $u_id));
		
		header("Location: http://192.168.43.36/gestion_com/utilisateur.php");
	}

}catch(Exception $e){
	echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}

?>