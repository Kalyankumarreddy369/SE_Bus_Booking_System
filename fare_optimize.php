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

