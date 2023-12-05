<?php

require_once("header.php");

?>



<div class="container-fluid">
<div class="row row-offcanvas row-offcanvas-left">
<div class="col-md-1">
&nbsp;
</div>
<div class="col-md-11">

<form style="max-width: 400px; margin: 0 auto;" action="" method="POST">
  <label style="display: block; margin-bottom: 10px;">
    User ID:
    <input type="text" name="user_id" style="margin-left: 10px; padding: 5px;">
  </label>
  <label style="display: block; margin-bottom: 10px;">
    Name:
    <input type="text" name="name" style="margin-left: 25px; padding: 5px;">
  </label>
  <label style="display: block; margin-bottom: 10px;">
    Email:
    <input type="email" name="email" style="margin-left: 25px; padding: 5px;">
  </label>
  <label style="display: block; margin-bottom: 10px;">
    Password:
    <input type="password" name="password" style="margin-left: 5px; padding: 5px;">
  </label>
  <input type="submit" value="Submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
</form>

<?php

$myconn = new mysqli("localhost","root","root","usvisaapplication");

if(!empty($_POST['user_id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) )
{
    $sqlqry = "INSERT INTO `userdata`(`user_id`,`name`,`email`,`password`) VALUES (?,?,?,?)";
     if ($stmt = $myconn->prepare($sqlqry)) {
        $stmt->bind_param("isss",$_POST['user_id'],$_POST['name'],$_POST['email'],$_POST['password']);
        if($stmt->execute()){
            if($myconn->affected_rows){
              $res['status'] = 1;
              $res['rows_affected'] = $myconn->affected_rows;
            }
        }
        
    }

    else{
        echo "statement Notttt prepared";
    }




}
if(!empty($myconn)){
    $res = array();
		    $res['xstatus'] = 0;
            $sqlqry = "select * from userlog";

			if ($stmt = $myconn->prepare($sqlqry)) {
                
				
				if($stmt->execute()){
					$stmt->bind_result($a,$b,$c,$d);
					$i=0;
					while($stmt->fetch()){
						$res['xstatus'] = 1;
						$res[$i]['a']=$a;
						$res[$i]['b'] = $b;
                        $res[$i]['c']=$c;
						$res[$i]['d'] = $d;
						$i++;
					}
					$res['ival']=$i;
				}
				else{
					echo "Some error with the statement execution";
				}
			}
			else{
				
                echo "Some error with the statement prepation with the given parameters or colums";
			}
		}
		else{
			
            echo "Some error with the Mysqli connection";
		}






if($res['xstatus']==1 && !empty($res['ival'])){

for($i=0; $i<$res['ival'];$i++){

?>

<table class="table table-bordered" style="margin: auto; border: 2px solid black;">
<h1 style="text-align: center;">Data from userlog, updated by a trigger whenver new user is created<h1>
  <thead style="background-color: #007bff; color: white;">
    <tr>
      <th scope="col">Login id</th>
      <th scope="col">User ID</th>
      <th scope="col">Action</th>
      <th scope="col">Timestamp when user created</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i=0; $i<$res['ival'];$i++): ?>
    <tr>
      <td><?php echo $res[$i]['a']; ?></td>
      <td><?php echo $res[$i]['b']; ?></td>
      <td><?php echo $res[$i]['c']; ?></td>
      <td><?php echo $res[$i]['d']; ?></td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>









<?php
}
}
?>
</div>
<?php
