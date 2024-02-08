<?php
    require '../serveur.php';
// var_dump($_POST);
session_start();
if(empty($_SESSION["username"])){
	header("Location: http://192.168.43.36/gestion_com/login.php");
	exit();
} 
    try{

        if(isset($_POST["unam"]) and isset($_POST["mdpp"]) and isset($_POST["contactt"])) {
            extract($_POST);
            $insert = $pdo->prepare("INSERT INTO client( nomc , mdpc , contact) VALUES (?,?,?)");
            $insert->execute(array($unam , $mdpp , "$contactt"));
            
            
            header("Location: http://192.168.43.36/gestion_com/utilisateur.php");
        }

}catch(Exception $e){
    var_dump($e);
    echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
   
}
header("Location: http://192.168.43.36/gestion_com/utilisateur.php");
?>