<?php
    session_start();
    require 'serveur.php';

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();   

    $stmtc = $pdo->prepare("SELECT * FROM client");
    $stmtc->execute();
    $client = $stmtc->fetchAll(); 
?>

<!DOCTYPE html>
<html lang="en">
<style>
        #connexion{
            display: block;
    margin: 30px auto;
    outline: 0;
    background: rgb(241, 255, 191);
    width: 40%;
    border: 0;
    padding: 10px;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
        }
        #connexion:hover {
    background: rgb(219, 252, 99);
}
#connexion:active {
    background: rgb(219, 252, 99);
}

img{
   /* width: 40px;
    border-radius: 100%;
    position: absolute;
    left: 660px;
    top: 120px;*/
    width: 100%;
    border-radius: 0px 0px 0px 0px;
    border-radius: 10px 10px 0px 0px;
}
   


    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>GS-Bogota</title>
</head>
<body>
    <div class="box-login">
<div class="tete">
<img src="assets/img/BOGOTA.jpg" alt="photo"><br>
   
</div>

        <form action="" method="POST">
            <div class="form-groupe">
                <label for="utilisateur"></label>
                <input type="text" name="Uinput" id="utilisateur" placeholder="Utilisateur">
                <img src="ressources/check.svg" alt="icone de validation" class="icone-verif">
                <span class="message-alerte">Choisissez un pseudo entre 3 et 24 caractères</span>
            </div>
            <div class="form-groupe">
                <label for="mdp"></label>
                <input type="password" name="Pinput" id="mdp" placeholder="Mot de passe">
            </div>
            <button type="submit" id="connexion">Connexion</button>
            
        </form>

    </div>


    <script src="app.js">
 
    </script>
</body>
</html>

<?php
    if(isset($_POST["Uinput"]) and isset($_POST["Pinput"])) {
        extract($_POST);
        $a = false;
        foreach($users as $u)
        {
            if($u["username"] == $Uinput && $u["password"] == $Pinput){
                $_SESSION["username"] = $_POST["Uinput"];
                header("Location: http://192.168.43.36/gestion_com/menu.php");
                $a = true;
            } 
        }

        foreach($client as $c)
        {
            if($c["nomc"] == $Uinput && $c["mdpc"] == $Pinput){
                $_SESSION["username"] = $_POST["Uinput"];
                header("Location: http://192.168.43.36/gestion_com/client/menu.php");
                $a = true;
            } 
        }

        if($a == false){
            echo "<script language='javascript'>";
            echo "alert('Login invalide')";
            echo "</script>";
            die();
        }
    }
?>