<?php 
$counter=0;

$update = false;
session_start();

require 'file/connection.php';
// add data
if(isset($_POST['subbtn'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	
	$sql = "INSERT INTO user ( `name`, `email`, `address`, `phone`)
	VALUES ('$name','$email','$address','$phone')";
	if ($conn->query($sql) === TRUE) {
		//$msg = "You have successfully registered. Please, login to continue.";
		header( "location:welcome.php");
	} else {
	//	$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:error.php" );
	}
}

// delete data

if(isset($_GET['del'])){

  $stu_id = $_GET['del'];
  
  $sql = "DELETE FROM user WHERE id = {$stu_id}";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
  
  header("Location: welcome.php");
}

// edit
if(isset($_GET['edit'])){
  $update = true;
  $edit_id = $_GET['edit'];
  
$sql = "SELECT * FROM user WHERE id = {$edit_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

if(mysqli_num_rows($result) > 0)  {
  while($row = mysqli_fetch_assoc($result)){
  ?>
<?php if ($update == true)?>
<form  action="welcome.php" method="post">
  <div class="form-group">
      <label>Name</label>
      <input type="hidden" name="editid" value="<?php echo $row['id']; ?>"/>
      <input type="text" name="editname" value="<?php echo $row['name']; ?>"/>
  </div>
  <div class="form-group">
      <label>Address</label>
      <input type="text" name="editaddress" value="<?php echo $row['address']; ?>"/>
  </div> 
  <div class="form-group">
      <label>Email</label>
      <input type="text" name="editemail" value="<?php echo $row['email']; ?>"/>
  </div> 
  <div class="form-group">
      <label>Phone</label>
      <input type="text" name="editphone" value="<?php echo $row['phone']; ?>"/>
  </div>
  <?php if ($update == true){ ?>
	<button  type="submit" name="edit_sub_btn" >update</button>


 
  </form>

	<?php }
  }
}}

//update
if (isset($_POST['edit_sub_btn'])) {
	$id = $_POST['editid'];
	$name = $_POST['editname'];
	$address = $_POST['editaddress'];
	$phone = $_POST['editphone'];
	$email = $_POST['editemail'];
  
	$result =mysqli_query($conn, "UPDATE `user` SET `name`='{$name}',`email`='{$email}',`address`='{$address}',`phone`='{$phone}'  WHERE id='{$id}'");

	header('location: welcome.php');
}
?>




<!DOCTYPE html>
<html lang="en">

<?php require 'Include/head.php'; ?>

<body>


<ul>
            <li >
                <a  href="./index.php">Welcome to the blood bank</a>
            </li>
            <div class="nav_login">
            <li>
                <a  href="reg.php">Welcome <?php echo $_SESSION['name']; ?> </a>
            </li>   
            <li>
                <a href="file/logout.php">Logout</a>
            </li>
            </div>
      </ul>
      
    <?php require 'message.php'; ?>
    <h1>Welcome <?php echo $_SESSION['name']; ?> </h1>
    <p>Email address: <?php echo $_SESSION['email'];?></p>
<?php if($update==false){ ?>
<div>
<form action="welcome.php"  method="post" enctype="multipart/form-data">
  
<label>Name:</label>
  <input type="text"  name="name" > <br> 
   <label >Address:</label>
  <input type="text"  name="address"> <br>  
  <label >Email:</label>
  <input type="text"  name="email"> <br> 
   <label >Phone:</label>
  <input type="text"  name="phone" > <br>
 
  
  <input type="submit" name="subbtn" value="Submit">
</form>

</div>
<?php } ?>
<h2>All Records</h2>
    <?php

     
$sql = "select * from user";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <a href='welcome.php?edit=<?php echo $row['id']; ?>'>Edit</a>
                    <a  href='welcome.php?del=<?php echo $row['id']; ?>'>Delete</a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php }else{
    echo "<h2>No Record Found</h2>";
  }?>

<?php require 'Include/footer.php'; ?>
</body>
</html>