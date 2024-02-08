<?php 
require 'serveur.php';    

$rece = ("SELECT * FROM recettes");
$rect=$pdo->query($rece);

$stoc = ("SELECT * FROM ingredients");
$stock=$pdo->query($stoc);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
 

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Nouvel recette
  </button>
<br>
<?php while($row = $rect->fetch(PDO::FETCH_ASSOC)) : ?>
  <a href="recettes.php?id_recet=<?php echo $row['id_recette']; ?>"><?php echo $row['recette_nom']; ?></a> <br>
  <?php endwhile; ?>
  <br><br><br>

<a href="ingredients.php">Les ingredients</a>
<br> <br><br>

<table>
    <thead>
        <tr>
            <th>Les ingrédients</th>
            <th>Quantités</th>
            <th>unity</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = $stock->fetch(PDO::FETCH_ASSOC)) :?>
        <tr>
            <td><?php echo $row['ing_nom'];?></td>
            <td><?php echo $row['qte'];?></td>
<?php
    if($row['ingredient_id'] == 1 || $row['ingredient_id'] == 2 || $row['ingredient_id'] == 3)
    {
?>
            <td>kg</td>
<?php
    }
?>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Votre recette</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="post">
                <input type="text" name="recet" id="recet" placeholder="La recette">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <input type="submit" value="Soumettre">
            </form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
</body>

<?php 
require 'serveur.php';    
session_start();

// insertion recette
    if(isset($_POST["recet"])) {
        extract($_POST);
    $data = $pdo->prepare("INSERT INTO recettes(recette_nom) VALUES (?)");
    $data->execute(array($recet));
    $ide = $pdo->lastInsertId();

    $_SESSION['ide'] = $ide;
    $_SESSION['recett'] = $recet;

    }
?>

</html>