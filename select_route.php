<?php 
 include "./dbcon/dbcon.php";
 $doj=$_POST["doj"];
 $selected_bus=$_POST["selected_bus"];
 $loc1=$_POST["loc1"];
 $loc2=$_POST["loc2"];
 $dob=$_POST["dob"];
 $cname=$_POST["cname"];
 $cage=$_POST["cage"];
 $cemail=$_POST["cemail"];
 $id_number=$_POST["id_number"];
 $uid=$_POST["uid"];

 if(!empty($doj) && !empty($selected_bus) && !empty($loc1) && !empty($loc2)){
    $booking_date=date("Y-m-d H:i:s");
    $booking_id=0;
    $busQry=mysqli_query($dbcon,"SELECT * FROM bus WHERE bus_id='$selected_bus'");
    $bus_fare=mysqli_fetch_assoc($busQry);
    $bus_fare_price=$bus_fare["bus_fare"];
    $total_fare=$bus_fare_price;
 	$qry1=mysqli_query($dbcon,"INSERT INTO booking(date,userid,bus_id,booking_date) VALUES('$doj','$uid','$selected_bus','$booking_date')");
 	if($qry1){
 		$booking_id=mysqli_insert_id($dbcon);
      $count =0;
 		for($i=0;$i < count($cname);$i++){
 			$cname_s=$cname[$i];
 			$cage_s=$cage[$i];
 			$cemail_s=$cemail[$i];
 			$id_number_s=$id_number[$i];
            
         if(!empty($cname_s) && !empty($cage_s) && !empty($id_number_s)){
            
	 			$qry2=mysqli_query($dbcon,"INSERT INTO customer(age,name,email,id_number,userid,booking_id) VALUES('$cage_s','$cname_s','$cemail_s','$id_number_s','$uid','$booking_id')");
               if($qry2){
                  $count++;
                  $total_fare+=$bus_fare_price;
               }       
            }
 		
      
 	
 }else{
   header("location:add_booking.php?message=Please Fill all required fields.");
 }

 
  

 ?>
