<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
 include "dbcon/dbcon.php";
 $uid=$_SESSION['uid'];
?>

<!DOCTYPE html>
<html>
<title> New Booking </title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Booking</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="home.php">Home</a>
	      </li>
	      <li class="nav-item  active">
	        <a class="nav-link" href="booking.php">Booking</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="passenger.php">Passenger Details</a>
	      </li>
		  <li class="nav-item">
	        <a class="nav-link" href="user.php">User</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="logout.php">logout</a>
	      </li>
	    </ul>
	  </div>
	</nav>

</body>
</html>
	<div class="pt-50"></div>
	<h3 class="text-center">Add New Booking</h3>
	<?php 
	if(isset($_GET["message"])){
   echo '<div class="alert alert-danger" role="alert">
						  '.$_GET["message"].'
						</div>';
	}
	if(isset($_GET["successmessage"])){
		   echo '<div class="alert alert-success" role="alert">
						  '.$_GET["successmessage"].'
						</div>';
	}
	?>
 	<div class="container bg-light p-3">
 		<form action="action/new_booking.php" method="POST">
 		<div class="row">
 			<div class="col col-12 col-md-6 col-lg-6">
            <div class="form-group">
            	<label for="date">Date of Journey</label>
            	<input type="date" name="doj" class="form-control">
            	<input type="hidden" name="uid" value="<?php echo $uid; ?>">
            </div>
            <div class="form-group">
            	<label for="bus_name">Bus Name</label>
            	<select class="form-control" name="selected_bus">
            		<?php
                      $qry=mysqli_query($dbcon,"SELECT b.,bt. FROM bus b LEFT JOIN bus_type bt ON b.bus_type=bt.bus_type_id");
                      	if($qry){
                      	while($arr=mysqli_fetch_assoc($qry)){
                      		?>
                            <option value="<?php echo $arr['bus_id'] ?>"><?php echo $arr["bus_name"]." | ".$arr["type1"]." | ".$arr["type2"]." | ".$arr["bus_fare"]."$ per person"; ?></option>
                      		<?php
						}
                      }?>
            
            		
            	</select>
            </div>
 			</div>
 			<div class="col col-12 col-md-6 col-lg-6">
          <div class="form-group">
          	<label for="source_location">Source Location</label>
          	<input type="text" name="loc1" class="form-control">
          </div>
          <div class="form-group">
          	<label for="source_location">Destination</label>
          	<input type="text" name="loc2" class="form-control">
          </div>
          <div class="form-group">
          	  <label for="source_location">Date Of booking</label>
          	  <input type="date" name="dob" class="form-control">
          </div>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-12 col-md-12 col-lg-12">
 				<h5>Customer Details</h5>
 				<table class="table table-striped"> 
 					<thead>
 				        <tr>
 				         	<td width="200">Name</td>
 				         	<td width="50">age</td>
 				         	<td width="200">Email(optional)</td>
 				         	<td width="200">id Number</td>
 				        </tr>		
 					</thead>
 					<tbody>
 						<tr>
 				         	<td width="200"><input type="text" name="cname[]"></td>
 				         	<td width="50"><input type="number" name="cage[]"></td>
 				         	<td width="200"><input type="email" name="cemail[]"></td>
 				         	<td width="200"><input type="text" name="id_number[]"></td>
 				        </tr>
 				        <tr>
 				         	<td width="200"><input type="text" name="cname[]"></td>
 				         	<td width="50"><input type="number" name="cage[]"></td>
 				         	<td width="200"><input type="email" name="cemail[]"></td>
 				         	<td width="200"><input type="text" name="id_number[]"></td>
 				        </tr>
 				        <tr>
 				         	<td width="200"><input type="text" name="cname[]"></td>
 				         	<td width="50"><input type="number" name="cage[]"></td>
 				         	<td width="200"><input type="email" name="cemail[]"></td>
 				         	<td width="200"><input type="text" name="id_number[]"></td>
 				        </tr>
 				        <tr>
 				         	<td width="200"><input type="text" name="cname[]"></td>
 				         	<td width="50"><input type="number" name="cage[]"></td>
 				         	<td width="200"><input type="email" name="cemail[]"></td>
 				         	<td width="200"><input type="text" name="id_number[]"></td>
 				        </tr>
 				        <tr>
 				         	<td width="200"><input type="text" name="cname[]"></td>
 				         	<td width="50"><input type="number" name="cage[]"></td>
 				         	<td width="200"><input type="email" name="cemail[]"></td>
 				         	<td width="200"><input type="text" name="id_number[]"></td>
 				        </tr>
 					</tbody>
 				</table>
 			</div>
 			<div class="col-12 col-md-12 col-lg-12 text-right">
 				<input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm mr-3">
 			</div>
 		</div>
 	    </form>
 	</div>
 
 </body>
 </html> 
