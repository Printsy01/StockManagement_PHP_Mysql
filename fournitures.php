<?php 
require 'serveur.php';    
session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 

if(isset($_GET['check'])){
	$test = $_GET['check'];
}

$stoc = ("SELECT * FROM fournitures ORDER BY fournitures_name ASC");
$stock=$pdo->query($stoc);

$igta = ("SELECT COUNT(*) as nba FROM fournitures WHERE qty <= 3") ;
$rea = $pdo->query($igta) ;
$reb = $rea->fetchAll();

foreach ($reb as $u) {
      $nba = $u['nba'];
}

$igt = ("SELECT COUNT(*) as nbb FROM fournitures") ;
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

$don = ("SELECT * FROM fournitures");
$recette=$pdo->query($don);
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

function error(myvar){
	if(myvar == 0){
		alert("Cet ingrédient existe déjà !");
	}
}
</script>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="menu.php" class="brand">
			<i><img src="assets/img/BOGOTA.jpg" style="width: 80px; height:80px; border-radius: 50%;margin-left:100px;margin-top:25px;"></i>
			<span class="text"></span>
		</a>
		<ul class="side-menu top">
			<li>
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
			<li  class="active">
			<a href="fournitures.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Vos matériels</span>
				</a>
			</li>
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
					<input oninput="searchfunction()" type="search" placeholder="Search........." id="myInput" class="form-control">
					<!-- <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> -->
				</div>
			<!-- <input type="checkbox" id="switch-mode" hidden> -->
			<!-- <label for="switch-mode" class="switch-mode"></label> -->
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
					<i></i>
					&#10133  <span class="text" >Ajouter un matériel</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i><img src="assets/img/materiel.jpg" style="width: 80px; height:80px; border-radius: 50%; margin-left:30px;"></i>
					<span class="text">
						<h3><?php echo $nbb; ?></h3>
						<p>Matériel(s)</p>
					</span>
				</li>
				<!-- <li>
					<i><img src="assets/img/menu.jpg" style="width: 80px; height:80px; border-radius: 50%;"></i>
					<span class="text">
						<h3><?php echo $nbr; ?></h3>
						<p>Recettes</p>
					</span>
				</li> -->
				
				<a href="warnings.php" style="text-decoration:none;"><li>
					<i><img src="assets/img/menu.jpg" style="width: 80px; height:80px; border-radius: 50%;"></i>
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
						<h3>Vos matériels</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table id="myTable">
						<thead>
							<tr>
							<th>Les matériels</th>
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
									<p><?php echo $row['fournitures_name'];?></p>
								</td>
								<td><?php echo $row['rayon'];?></td>
								<td><?php echo $row['qty'];?></td>
								<td><?php echo $row['unity'];?></td>
								<td><span><a data-toggle="modal" href="#myModal<?php echo $row['fournitures_id']; ?>"><img src="assets/img/edit.png" style="width:25px;height:25px;"><i class="ri-edit-line edit"></a></i>
    <!-- <td><button onclick="document.getElementById('id02').style.display='block'"><span><i class="ri-edit-line edit"></i></button> -->
    <a onclick = "sure(<?php echo $row['fournitures_id']; ?>);" href="#"><img src="assets/img/delete.jpg" style="width:25px;height:25px;"><i class="ri-delete-bin-line delete"></i>
    <!-- <a href="perso1.php?userin_id=<?php echo $row['fournitures_id']; ?>"><i class="ri-delete-bin-line delete"></i></a> -->
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
          <h4 class="modal-title">Nouveau matériel</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="insert/insert_fournitures.php" method="post" id="ff">
			<ul class="breadcrumb" id="lis">
<li><input oninput="check()" class="form-control" type="text" placeholder="Le matériel" name="rct" id="rct" style="width:120px;"></li>
<li><select class="form-control" placeholder="Son rayon" name="ray" id="ray" style="width:120px;">
              <!-- <option value="Surgelé">Surgelé</option> -->
              <!-- <option value="Boucherie Charcuterie">Boucherie Charcuterie</option> -->
              <!-- <option value="Cremerie">Cremerie</option> -->
			  <!-- <option value="Légumes Fruits">Légumes Fruits</option> -->
			  <option value="Epicerie">Epicerie</option>
			  <option value="Cave">Cave</option>
			  <option value="Packaging">Packaging</option>
			  <option value="Produit E H">Produit E H</option>
            </select></li>

			<li><select class="form-control" name="u" id="u" style="margin-left:px;">
              <option value="kg">kg</option>
              <!-- <option value="litre">litre</option> -->
              <option value="pieces">pieces</option>
              <!-- <option value="pieces">btte</option> -->
            </select></li>
			</ul>
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
	<script src="assets/js/menu.js"></script>
</body>
<script>
var btn = document.getElementById("btn");
btn.disabled = true;
document.getElementById("rct").addEventListener("input" , check);

function check() {
    var text = document.getElementById("rct").value;
    if(text != ""){
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}

function sure(var1) {
    if(confirm("Sure ?")){
        window.location.href = "delete/delete_fournit.php?id_r=" + var1;
    }
}
</script>

<?php 
 
 $sql = "SELECT * FROM fournitures" ;
 $sttb = $pdo -> query($sql);

while($row = $sttb->fetch(PDO::FETCH_ASSOC)) : 
?>
<!-- ADMIN UPDATE   -->

<div class="container mt-3">
 
 <div class="modal fade" id="myModal<?php echo $row['fournitures_id']; ?>">
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
     <form action="update/update_fournit.php" method="POST">
 <!-- <h2 class="w3-text-blue">Un nouvel matériel</h2> -->
 <p>
 <input oninput="check1()" class="form-control" name="ingname" id="ingname" cols="30" rows="10" value="<?php echo $row['fournitures_name']; ?>"></p>
 <p><select class="form-control" placeholder="Son rayon" name="ray" id="ray">
	 		 <option value="<?php echo $row['rayon']; ?>"><?php echo $row['rayon']; ?></option>
 			  <!-- <option value="Surgelé">Surgelé</option> -->
              <!-- <option value="Boucherie Charcuterie">Boucherie Charcuterie</option> -->
              <!-- <option value="Cremerie">Cremerie</option> -->
			  <option value="Légumes Fruits">Légumes Fruits</option>
			  <!-- <option value="Epicerie">Epicerie</option> -->
			  <option value="Cave">Cave</option>
			  <option value="Packaging">Packaging</option>
			  <option value="Produit E H">Produit E H</option>
            </select></p>
 <p>
 <input type="number"  class="form-control" onkeyup="pasVirgule(this)" name="ingqte" id="ingqte" cols="30" rows="10" value="<?php echo $row['qty']; ?>"></p>
 <select class="form-control" name="u" id="u">
 <option value="<?php echo $row['unity']; ?>"><?php echo $row['unity']; ?></option>
              <option value="kg">kg</option>
              <option value="litre">litre</option>
              <option value="pieces">pieces</option>
              <option value="pieces">btte</option>
            </select>
			<br><br>
			<p>
 <input class="form-control" style="display:none;" name="ingid" id="ingid" cols="30" rows="10" value="<?php echo $row['fournitures_id']; ?>"></p>
 <button type="submit" class="btn btn-secondary" id="btn2">Modifier</button></p>
</form>  </div>
       
       <!-- Modal footer -->
       <div class="modal-footer">
       </div>
       
     </div>
   </div>
 </div>
 <?php endwhile;?>

</div>
<script>
check();
check1();
check2();
function check() {
    var qt = document.getElementById("ingqte").value;
    var btn = document.getElementById("btn2");
	on();
    if(qt < 0 || qt == "") {
      btn.disabled = true;
    } else {
      btn.disabled = false;
    }
}

function check1(){
	var qta = document.getElementById("rct").value;
    var bt = document.getElementById("btn1");

    if(qta == "") {
      bt.disabled = true;
    } else {
      bt.disabled = false;
    }
}

function check2(){
	var qta = document.getElementById("ingqte").value;
    var bt = document.getElementById("btn2");

    if(qta < 0) {
      bt.disabled = true;
    } else {
      bt.disabled = false;
    }
}

const chr = document.getElementById("warnVal").value;
const wn = document.getElementById("warn");

if(chr == 0){
	wn.style.color = 'green';
} else {
	wn.style.color = 'red';
}
function pasVirgule(obj){

obj.value=obj.value.replace(/[^0-9,.]/g,'');
obj.value=obj.value.replace(/,/g,'.');

}
</script>
</html>