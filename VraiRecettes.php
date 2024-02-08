<?php 
require 'serveur.php'; 
// require 'menu.php';
// var_dump($_GET);
    $ide = $_GET['id_recet'];

    $don = ("SELECT * FROM ingredients");
    $recette=$pdo->query($don);

$rct = $pdo->prepare("SELECT * FROM recettes");
$rct->execute();
$recettea = $rct->fetchAll();

foreach($recettea as $larecette)
{
    if($larecette["id_recette"] == $ide) {
		$recettes = $larecette["recette_nom"];
    }
}

$show =("SELECT * FROM contenants 
INNER JOIN ingredients ON contenants.ingredient_id = ingredients.ingredient_id 
WHERE recette_id ='$ide'");
$cont = $pdo->query($show);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
	<link rel="stylesheet" href="assets/css/styles.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="menu.php" class="brand">
		<i><img src="assets/img/BOGOTA.jpg" id="logo"></i>
			<span class="text"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="menu.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Menu</span>
				</a>
			</li>
			<li class="active">
				<a href="recettes1.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Vos recettes</span>
				</a>
			</li>
<li>
<a href="fournitures.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Vos matériels</span>
				</a>
</li>
<li></li><li></li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="User.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Privilèges admin</span>
				</a>
			</li>
			<li>
				<a href="deco.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..." class="form-control"> -->
					<!-- <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> -->
				</div>
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->

		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Fast Casual</h1>
					<form action="insert/content_insert.php" method="post" id="myF">
					<input type="text" name="ide" style="display:none;" value="<?php echo $ide; ?>">
					<ul class="breadcrumb">
					<li>Ajouter un ingrédient:</li>
						<li>
			<select class="form-control" name="ing" id="ing">
            <?php while($row = $recette->fetch(PDO::FETCH_ASSOC)) : ?>
        <option value="<?php echo $row['ing_nom']; ?>"><?php echo $row['ing_nom']; ?></option>
            <?php endwhile; ?>
            </select>
			</li>
			<li><input oninput="test()" class="form-control" type="text" placeholder="qty" name="qta" id="num" style="margin-left:-15px;width:75px;"></li>
			<li>
			<select class="form-control" name="u" id="u" style="margin-left:-15px;">
              <option value="kg">kg</option>
              <option value="litre">litre</option>
              <option value="pieces">pieces</option>
              <option value="pieces">btte</option>
            </select>
			</li>
						<li><button class="btn btn-secondary" id="sub" style="margin-left:-25px;">Choisir</button></li>
					</ul>
				</form>
				</div>
				<a href="calcul.php?idde=<?php echo $ide; ?>" class="btn btn-success">
					<!-- <i class='bx bxs-cloud-download' ></i> -->
					<span class="text">&#10004 Executer la recette</span>
				</a>
			</div>
<!-- 
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $nbb; ?></h3>
						<p>Ingrédients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $nbr; ?></h3>
						<p>Recettes</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3><?php echo $nba; ?></h3>
						<p>Warnings</p>
					</span>
				</li>
			</ul> -->


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Les ingrédients pour : <?php echo $recettes; ?></h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table>
						<thead>
							<tr>
							<th>Les ingrédients</th>
							<th>Rayon</th>
                            <th>Quantités</th>
                            <th>unity</th>
							</tr>
						</thead>
						<tbody>

                        <?php while($row = $cont->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
				<td><?php echo $row['ing_nom']; ?></td>
				<td><?php echo $row['rayon'];?></td>
                <td id=""><?php echo $row['qtee']; ?></td>
                <td><?php echo $row['unity']; ?></td>
				<td><span></i>
    <!-- <td><button onclick="document.getElementById('id02').style.display='block'"><span><i class="ri-edit-line edit"></i></button> -->
    <a onclick = "" href="delete/delete_ingredients_content.php?id_r=<?php echo $row['ingredient_id']; ?>&id_rec=<?php echo $row['recette_id']; ?>"><img src="assets/img/delete.jpg" style="width:25px;height:25px;"><i class="ri-delete-bin-line delete"></i>
    <!-- <a href="perso1.php?userin_id=<?php echo $row['ingredient_id']; ?>"><i class="ri-delete-bin-line delete"></i></a> -->
    </span></a></td>

           </tr>
                        <?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>

	</section>

	

	<script src="assets/js/scripts.js"></script>
	
</body>

<?php 
 
 $sql = ("SELECT * FROM contenants 
 INNER JOIN ingredients ON contenants.ingredient_id = ingredients.ingredient_id 
 WHERE recette_id ='$ide'");
 $sttb = $pdo -> query($sql);

while($rw = $sttb->fetch(PDO::FETCH_ASSOC)) : 
?>
<!-- ADMIN UPDATE   -->

<div class="container mt-3">
 
 <div class="modal fade" id="myModal<?php echo $rw['ingredient_id']; ?>">
   <div class="modal-dialog">
     <div class="modal-content">

       <!-- Modal Header -->
	   <div class="modal-header">
          <h4 class="modal-title">Apporter une modification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
       <!-- Modal body -->
       <div class="modal-body">
           <br>
     <form action="update/update_rect.php" method="POST">
 <!-- <h2 class="w3-text-blue">Un nouvel matériel</h2> -->
 <p>
 <input class="form-control" name="nameI" id="" cols="30" rows="10" value="<?php echo $rw['ing_nom']; ?>"></p>
 <p>
 <input onkeyup="pasVirgule(this)" class="form-control" name="ingqte" id="ingqte" cols="30" rows="10" value="<?php echo $rw['qtee']; ?>"></p>

 <select class="form-control" name="ingU" id="ingU">
 <option value="<?php echo $row['unity']; ?>"><?php echo $rw['unity']; ?></option>
              <option value="kg">kg</option>
              <option value="litre">litre</option>
              <option value="pieces">pieces</option>
              <option value="pieces">btte</option>
</select>
			<br>

			<input style="display:none;" class="form-control" name="ingnum" id="ingnum" cols="30" rows="10" value="<?php echo $rw['ingredient_id']; ?>">
			<input style="display:none;" class="form-control" name="ingR" id="ingR" cols="30" rows="10" value="<?php echo $rw['recette_id']; ?>">
			<input style="display:none;" class="form-control" name="ide" id="ide" cols="30" rows="10" value="<?php echo $ide; ?>">
			<br>
 <input type="submit" value="Modifier" class="btn btn-secondary">
</div>

       
       <!-- Modal footer -->
       <div class="modal-footer">
       </div>
</form>  
       
     </div>
   </div>
 </div>
 <?php endwhile;?>

<script src="assets/js/VR.js"></script>
<script>
function pasVirgule(obj){
obj.value=obj.value.replace(/[^0-9,.]/g,'');
obj.value=obj.value.replace(/,/g,'.');
}
// var btn = document.getElementById("btn1");
// btn.disabled = true;
// check();
// function check() {
// 	var qty = parseFloat(document.getElementById("qt").value);

// 	if(qty == "" || qty <= 0){
// 		btn.disabled = true;
// 	} else if(qty>0){
// 		btn.disabled = false;
// 	}
// }


function sureee(myVar) {
    if(confirm("Sûr ? ")){
        window.location.href = "delete/delete_ingredients_content.php?id_r=" + myVar;
	}
}


var quantite = document.getElementById("qta").value;
var in = document.createElement("input");
in.name = "qt";
in.value = quantite;

in.style.display = "none";
var fmr = document.getElementById("myF");
fmr.appendChild(in);
</script>
</html>

