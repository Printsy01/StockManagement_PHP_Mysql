<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
<p>
<?php
$y = "sss";
$x = "Bonjour $y";
echo $x;
if(!file_exists("fichier.txt")){
    touch("fichier.txt");
}

?>

<br>

<?php
$z = 6;
$x = 3;
echo $x;
?>
</p>
</body>
</html>
