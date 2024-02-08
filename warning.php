<?php 
require 'serveur.php';   
// require 'menu.php';
session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 

$stoc = ("SELECT * FROM ingredients WHERE qte <= 3 ORDER BY ing_nom ASC");
$stock=$pdo->query($stoc);

$igta = ("SELECT COUNT(*) as nba FROM ingredients WHERE qte <= 3") ;
$rea = $pdo->query($igta) ;
$reb = $rea->fetchAll();

foreach ($reb as $u) {
      $nba = $u['nba'];
}

$igt = ("SELECT COUNT(*) as nbb FROM ingredients") ;
$rea = $pdo->query($igt) ;
$reb = $rea->fetchAll();

foreach ($reb as $u) {
      $nbb = $u['nbb'];
}

$igtr = ("SELECT COUNT(*) as nbr FROM recettes") ;
$rea = $pdo->query($igtr) ;
$reb = $rea->fetchAll();

foreach ($reb as $u) {
      $nbr = $u['nbr'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	

	<title>GS-Bogota</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="menu.php" class="brand">
		<i><img src="assets/img/BOGOTA.jpg" style="width: 80px; height:80px; border-radius: 50%;margin-left:100px;margin-top:25px;"></i>
			<span class="text"></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="menu.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Menu</span>
				</a>
			</li>
			<li>
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
			<li>
			</li>
			<li>
			</li>
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
					<span class="text">Deconnexion</span>
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
			<!-- <a href="#" class="nav-link">Categories</a> -->
				<div class="form-input">
					<input oninput="searchfunction()" type="search" placeholder="Search........." id="myInput" class="form-control" style="width:500px;border-radius:35px;">
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
					<!-- <ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul> -->
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<ul class="box-info">
				<li>
					<i><img src="assets/img/sary.jpeg" style="width: 80px; height:80px; border-radius: 50%;"></i>
					<span class="text">
						<h3><?php echo $nbb; ?></h3>
						<p>Ingrédients</p>
					</span>
				</li>
				<li>
					<i><img src="assets/img/recette.jpg" style="width: 80px; height:80px; border-radius: 50%;"></i>
					<span class="text">
						<h3><?php echo $nbr; ?></h3>
						<p>Recettes</p>
					</span>
				</li>
                <a href="warning.php"  style="text-decoration:none;">
				<li>
					<i><img src="assets/img/error.jpeg" style="width: 80px; height:80px; border-radius: 50%;"></i>
					<span class="text">
						<h3 id="warnVal"><?php echo $nba; ?></h3>
						<p id="warn">ALERTE(S)</p>
					</span>
				</li>
            </a>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Vos ingrédients</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table id="myTable">
						<thead>
							<tr>
							<th>Les ingrédients</th>
							<th>Rayon</th>
                            <th>Quantités</th>
                            <th>unity</th>
							</tr>
						</thead>
						<tbody>
                        <?php while ($row = $stock->fetch(PDO::FETCH_ASSOC)) :?>
							<tr>
								<td>
									<!-- <img src="img/people.png"> -->
									<p><?php echo $row['ing_nom'];?></p>
								</td>
								<td><?php echo $row['rayon'];?></td>
								<td><span class="status pending"><?php echo $row['qte'];?></span></td>
								<td><?php echo $row['unity'];?></td>
								<td><span><a data-toggle="modal" href="#myModal<?php echo $row['ingredient_id']; ?>"><img src="assets/img/edit.png" style="width:25px;height:25px;"><i class="ri-edit-line edit"></a></i>
    <!-- <td><button onclick="document.getElementById('id02').style.display='block'"><span><i class="ri-edit-line edit"></i></button> -->
    <a onclick = "sure(<?php echo $row['ingredient_id']; ?>);" href="#"><img src="assets/img/delete.jpg" style="width:25px;height:25px;"><i class="ri-delete-bin-line delete"></i>
    <!-- <a href="perso1.php?userin_id=<?php echo $row['ingredient_id']; ?>"><i class="ri-delete-bin-line delete"></i></a> -->
    </span></a></td>
							</tr>
							
                            <?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<!-- <div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div> -->
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="assets/js/scripts.js"></script>
</body>
<?php 
 
 $sql = "SELECT * FROM ingredients" ;
 $sttb = $pdo -> query($sql);

while($row = $sttb->fetch(PDO::FETCH_ASSOC)) : 
?>
<!-- ADMIN UPDATE   -->

<div class="container mt-3">
 
 <div class="modal fade" id="myModal<?php echo $row['ingredient_id']; ?>">
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
     <form action="update/update_igt.php" method="POST">
 <!-- <h2 class="w3-text-blue">Un nouvel matériel</h2> -->
 <p>
 <input class="form-control" name="ingname" id="ingname" cols="30" rows="10" value="<?php echo $row['ing_nom']; ?>"></p>
 <p><select class="form-control" placeholder="Son rayon" name="ray" id="ray">
 			  <option value="<?php echo $row['rayon']; ?>"><?php echo $row['rayon']; ?></option>
 			  <option value="Surgelé">Surgelé</option>
              <option value="Boucherie Charcuterie">Boucherie Charcuterie</option>
              <option value="Cremerie">Cremerie</option>
			  <option value="Légumes Fruits">Légumes Fruits</option>
			  <option value="Epicerie">Epicerie</option>
			  <option value="Cave">Cave</option>
			  <option value="Packaging">Packaging</option>
			  <option value="Produit E H">Produit E H</option>
            </select></p>
 <p>
 <input class="form-control" name="ingqte" id="ingqte" cols="30" rows="10" value="<?php echo $row['qte']; ?>"></p>
 <select class="form-control" name="u" id="u">
 <option value="<?php echo $row['unity']; ?>"><?php echo $row['unity']; ?></option>
              <option value="kg">kg</option>
              <option value="litre">litre</option>
              <option value="pieces">pieces</option>
              <option value="pieces">btte</option>
            </select>
			<br><br>
			<p>
 <input class="form-control" style="display:none;" name="ingid" id="ingid" cols="30" rows="10" value="<?php echo $row['ingredient_id']; ?>"></p>
 <button type="submit" class="btn btn-secondary">Modifier</button></p>
</form>  </div>
       
       <!-- Modal footer -->
       <div class="modal-footer">
       </div>
       
     </div>
   </div>
 </div>
 <?php endwhile;?>

 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nouvel ingredient</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="insert/insert_igt.php" method="post">
			<ul class="breadcrumb">
<li><input class="form-control" type="text" placeholder="La recette" name="rct" id="" style="width:150px;"></li>

<li><input class="form-control" type="number" placeholder="qty" name="qty" id="" style="width:75px;"></li>

			<li><select class="form-control" name="u" id="u" style="margin-left:px;">
              <option value="kg">kg</option>
              <option value="litre">litre</option>
              <option value="pieces">pieces</option>
              <option value="pieces">btte</option>
            </select></li>
			</ul>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-secondary" value="Soumettre">
            </form>
        </div>
        
      </div>
    </div>
  </div>

<script>
var chr = document.getElementById("warnVal").value;
var wn = document.getElementById("warn");
if(chr == 0){
	wn.style.color = "green";
} else {
	wn.style.color = "red";
}

function sure(var1) {
    if(confirm("Sure ?")){
        window.location.href = "delete/delete_ingredients.php?id_r=" + var1;
    }
}

function searchfunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue,j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td");
      for(j=0;j<td.length;j++){
        if(td[j]){
          txtValue = td[j].textContent || td[j].innerText;
          txtValue= txtValue.toUpperCase();
           if (txtValue.indexOf(filter) > -1) {
            tr[i].style.display = "";
            break;
           }else {
          tr[i].style.display = "none";
        }
      
        }
      }
     
    
  }
}
</script>
</html>