<?php 
require 'serveur.php'; 
// require 'menu.php';
session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 

    $don = ("SELECT * FROM historique");
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
			<li>

			</li>
			<li>

			</li>
			<li>

			</li>
		</ul>
		<ul class="side-menu">
			<li class="active">
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
		<div class="form-input">
		<input oninput="searchfunction()" type="search" placeholder="Search........." id="myInput" class="form-control" style="width:500px;border-radius:35px;">

			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			<!-- <a href="#" class="notification"> -->
				<!-- <i class='bx bxs-bell' ></i> -->
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <div class="head-title">
				<div class="left">
					<a href="User.php"><button class="btn btn-secondary">Retour</button></a>
				</div>
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
						<h3>Vos activités</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table id="myTable">
						<thead>
							<tr>
                            <th>Recette réalisée</th>
                            <th>Date</th>
							</tr>
						</thead>
						<tbody>

                        <?php while($row = $recette->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['recette_nom']; ?></td>
                <td><?php echo $row['date']; ?></td>
				<!-- <td><span><a data-toggle="modal" href="#myModal<?php echo $row['user_id']; ?>"><img src="assets/img/edit.png" style="width:25px;height:25px;"><i class="ri-edit-line edit"></a></i> -->
    <!-- <td><button onclick="document.getElementById('id02').style.display='block'"><span><i class="ri-edit-line edit"></i></button> -->
    <td><a onclick = "sure(<?php echo $row['histo_id']; ?>);" href="#"><img src="assets/img/delete.jpg" style="width:25px;height:25px;"><i class="ri-delete-bin-line delete"></i>
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



<script>
function sure(var1) {
    if(confirm("Sure ?")){
        window.location.href = "delete/delete_histo.php?id_r=" + var1;
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
