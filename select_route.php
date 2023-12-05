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
<title> Booking </title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking</title>
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
	      <li class="nav-item active">
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
	<div class="pt-50"></div>
	<div class="container">
		<div class="row">
			<div class="col col-12 col-md-12 col-lg-12">
				<div class="card bg-light">
					<div class="text-right">
						<a href="add_booking.php" class="btn btn-sm btn-success">New Booking</a>
					</div>
					<div class="booking-table mt-3">
						<?php
                          $qry=mysqli_query($dbcon,"SELECT bo.*,bu.bus_name,count(cust.customer_id) as count FROM bus bu INNER JOIN booking bo ON bo.bus_id=bu.bus_id INNER JOIN customer cust oN bo.booking_id=cust.booking_id WHERE bo.userid='$uid' and cust.booking_id in ( select booking_id from booking ) group by cust.booking_id;");
                          if($qry){
                          	if(mysqli_num_rows($qry) > 0){
                          		echo "<table class='table table-striped'>
                                        <tr>
                                            <td>Booking ID</td>
											<td>No of Passengers</td>
                                            <td>Total Fare</td>
                                            <td>Date Of Journey</td>
                                            <td>Bus Name</td>
                                            <td>Date of Booking</td>
                                        </tr>";
                          		while($arr=mysqli_fetch_assoc($qry)){
                          			echo "<tr>
                                            <td>".$arr['booking_id']."</td>
											<td>".$arr['count']."</td>
                                            <td>".$arr['fare']."</td>
                                            <td>".date("d/m/Y",strtotime($arr['date']))."</td>
                                            <td>".$arr['bus_name']."</td>
                                            <td>".date("d/m/Y H:i:s",strtotime($arr['booking_date']))."</td>
                                        </tr>";
                          		}
                          		echo "</table>";
                          	}
                          }

						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
