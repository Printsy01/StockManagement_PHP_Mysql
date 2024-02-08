<?php
	require '../serveur.php';
    $ingt = ("SELECT * FROM ingredients");
    $ingred = $pdo->query($ingt);
	$res = $ingred->fetchAll();
	$a = false;
	try{

		if(isset($_POST["rct"])  && isset($_POST["u"])) {
			extract($_POST);
			$rct = strtolower($rct);
			foreach($res as $u){
				if($u['ing_nom'] == $rct){
					header('Location: http://192.168.43.36/gestion_com/menu.php?check='.urlencode(0));
					$a = true;
				}
			}
			if($a == false){
				$getdata = $pdo->prepare("INSERT INTO ingredients(ing_nom ,qte,rayon,unity) VALUES (?,?,?,?)");
				$getdata->execute(array($rct , 0 ,$ray,$u ));
				header("Location: http://192.168.43.36/gestion_com/menu.php");

			}
			
		}
	
}catch(Exception $e){
	echo "<script language='javascript'>";
	echo "alert('Erreur')";
	echo "</script>";
}
		?>
