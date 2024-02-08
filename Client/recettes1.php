<?php 
require 'serveur.php';    
// require 'menu.php';

session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 

if(isset($_GET["check"])){
	$test = $_GET["check"];
}
$rece = ("SELECT * FROM recettes");
$rect=$pdo->query($rece);

$stoc = ("SELECT * FROM ingredients ORDER BY ing_nom ASC");
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

if(isset($_POST["newR"])){
	extract($_POST);
	$getdata = $pdo->prepare("INSERT INTO recettes(recette_nom) VALUES (?)");
	$getdata->execute(array($newR));
	$val = $newR;
	$data = "SELECT id_recette FROM recettes WHERE recette_nom = :val";
	$stmt = $pdo->prepare($data);
	$stmt->bindValue(':val' , $newR , PDO::PARAM_INT);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	header("Location: VraiRecettes.php?id_recet=".$data["id_recette"]);
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
<script>
window.onload = function(){
	error(<?php echo $test; ?>);
}

function error(myVar){
	if(myVar == 0){
		alert("Il vous manque un certain ingrédient pour réaliser cette recette !");
	}
}

</script>

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
					<i class='bx bxs-shopping-bag-alt'></i>
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
				<!-- <a href="User.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Privilèges admin</span>
				</a> -->
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
					<input oninput="searchfunction()" type="search" placeholder="Search........." id="myInput" class="form-control" >
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
				<a href="#" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
					<!-- <i class='bx bxs-cloud-download' ></i> -->
					&#10133<span class="text">Ajouter une recette</span>
				</a>
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
				<a href="warning.php" style="text-decoration:none;">
				<li>
					<i><img src="assets/img/error.jpeg" style="width: 80px; height:80px; border-radius: 50%;"></i>
					<span class="text">
						<h3 id="warnVal"><?php echo $nba; ?></h3>
						<p id="warn" style="color:red;">ALERTE(S)</p>
					</span>
				</li>
            </a>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Vos recettes</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table id="myTable">
						<thead>
							<tr>
                            <th>Les ingrédients</th>
							</tr>
						</thead>
						<tbody>
<?php while($row = $rect->fetch(PDO::FETCH_ASSOC)) : ?>
<tr>
  <td><a style="text-decoration:none;" href="VraiRecettes.php?id_recet=<?php echo $row['id_recette']; ?>"><?php echo $row['recette_nom']; ?></a></td>
  <td><span></i><!-- <td><button onclick="document.getElementById('id02').style.display='block'"><span><i class="ri-edit-line edit"></i></button> -->
    <a onclick = "sure(<?php echo $row['id_recette']; ?>);" href="#"><img src="assets/img/delete.jpg" style="width:25px;height:25px;"><i class="ri-delete-bin-line delete"></i>
    <!-- <a href="perso1.php?userin_id=<?php echo $row['id_recette']; ?>"><i class="ri-delete-bin-line delete"></i></a> -->
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
	 <!-- The Modal -->
	 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nouvelle recette</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="recettes1.php" method="post" id="ff">
			<input type="text" class="form-control" placeholder="Votre nouvelle recette" name="newR">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-secondary" value="Soumettre" id="btn">
            </form>
        </div>
        
      </div>
    </div>
  </div>

	<script src="assets/js/scripts.js"></script>
	<script>
	<?php 

	?>

function sure(var1) {
    if(confirm("Sure ?")){
        window.location.href = "delete/delete_recette.php?id_r=" + var1;
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
</body>
</html>