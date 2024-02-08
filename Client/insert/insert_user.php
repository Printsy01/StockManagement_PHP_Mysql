<?php
    require '../serveur.php';

    try{

        if(isset($_POST["unam"]) and isset($_POST["mdpp"]) and isset($_POST["contactt"])) {
            extract($_POST);
            $insert = $pdo->prepare("INSERT INTO users(username , password , contact) VALUES (?,?,?)");
            $insert->execute(array($unam , $mdpp , $contactt));
            
            
            header("Location: http://192.168.43.36/gestion_com/User.php");
        }

}catch(Exception $e){
    echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}
?>