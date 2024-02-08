<?php    
    require '../serveur.php';

	session_start();
if(empty($_SESSION["username"])){
	header("Location: http://192.168.43.36/gestion_com/login.php");
	exit();
} 
try{

	if(isset($_POST["uname"]) and isset($_POST["mdp"]) and isset($_POST["uc"])) {
		extract($_POST);
		$update = $pdo->prepare("UPDATE users SET  username=?, password =? , contact = ? WHERE user_id =?");
		$update->execute(array($uname , $mdp , $uc , $u_id));
		
		header("Location: http://192.168.43.36/gestion_com/User.php");
	}

}catch(Exception $e){
	echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}

?>