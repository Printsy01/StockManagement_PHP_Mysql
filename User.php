<?php 
require 'serveur.php'; 
session_start();
if(empty($_SESSION["username"])){
	header("Location: http://localhost/gestion_com/login.php");
	exit();
} 

    $don = ("SELECT * FROM users");
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

	<title>GS-Bogota</title>
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
			<li class="active">
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Privilèges admin</span>
				</a>
			</li>
			<li>
				<a href="deco.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Déconnexion</span>
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
			<a href="#" class="nav-link"></a>

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
					<a href="historique.php"><button class="btn btn-secondary">Voir les historiques</button></a>
					<a href="utilisateur.php"><button class="btn btn-info">Voir les utilisateurs</button></a>
				</div>
				<a href="#" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
					<i class='bx bxs-cloud-download' ></i>
					&#10133<span class="text">Ajouter un administrateur</span>
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
						<h3>Les administrateurs</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table>
						<thead>
							<tr>
                            <th>Nom</th>
                            <th>Mot de passe</th>
                            <th>Contact</th>
							</tr>
						</thead>
						<tbody>

                        <?php while($row = $recette->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['contact']; ?></td>
				<td><span><a data-toggle="modal" href="#myModal<?php echo $row['user_id']; ?>"><img src="assets/img/edit.png" style="width:25px;height:25px;"><i class="ri-edit-line edit"></a></i>
    <!-- <td><button onclick="document.getElementById('id02').style.display='block'"><span><i class="ri-edit-line edit"></i></button> -->
    <a onclick = "sure(<?php echo $row['user_id']; ?>);" href="#"><img src="assets/img/delete.jpg" style="width:25px;height:25px;"><i class="ri-delete-bin-line delete"></i>
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

 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Un nouvel utilisateur</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="insert/insert_user.php" method="post">
			<input oninput="check()" type="text" name="unam" id="unam" class="form-control" placeholder="Nom"> <br>
            <input oninput="check()" type="password" name="mdpp" id="mdpp" class="form-control" placeholder="Mot de passe"> <br>
            <input oninput="check()" type="text" name="contactt" id="contactt" class="form-control" placeholder="Contact">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-secondary" value="Soumettre" id="btn1">
            </div>
        </form>
        
      </div>
    </div>
  </div>

<?php 
 
 $sql = ("SELECT * FROM users");
 $sttb = $pdo -> query($sql);

while($row = $sttb->fetch(PDO::FETCH_ASSOC)) : 
?>
<!-- ADMIN UPDATE   -->

<div class="container mt-3">
 
 <div class="modal fade" id="myModal<?php echo $row['user_id']; ?>">
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
     <form action="update/update_admin.php" method="POST">
 <!-- <h2 class="w3-text-blue">Un nouvel matériel</h2> -->
 <p>
 <input class="form-control" name="uname" id="uname" cols="30" rows="10" value="<?php echo $row['username']; ?>"></p>
 <p>
 <input class="form-control" name="mdp" id="mdp" cols="30" rows="10" value="<?php echo $row['password']; ?>"></p>
 <input class="form-control" name="uc" id="uc" cols="30" rows="10" value="<?php echo $row['contact']; ?>"></p>
<br>
<input style="display:none;" class="form-control" name="u_id" id="ingname" cols="30" rows="10" value="<?php echo $row['user_id']; ?>">
<br>
 <button type="submit" class="btn btn-secondary">Modifier</button></p>
</form>  </div>
       
       <!-- Modal footer -->
       <div class="modal-footer">
       </div>
       
     </div>
   </div>
 </div>
 <?php endwhile;?>

<script>
function sure(var1) {
    if(confirm("Sure ?")){
        window.location.href = "delete/delete_user.php?id_r=" + var1;
    }
}

// function check() {
//     var nom = document.getElementById("unam").value;
//     var mdp = document.getElementById("mdpp").value;
//     var ct = document.getElementById("contactt").value;
//     var btn = document.getElementById("btn1");

//     if(nom == "" || mdp == "" || ct == ""){
//         btn.disabled = true;
//     } else {
//         btn.disabled = false;
//     }
// } 
</script>
</html>
