
<?php
session_start();
    require 'connection.php';
    if(isset($_POST['rlogin'])){
 
        
     $email=$_POST['email'];
     $password=$_POST['psw'];
    $sql="SELECT * FROM reguser WHERE email='$email' AND password='$password'";
     $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
     if($rows_fetched==0){
     // $error= "Wrong email or password. Please try again.";
        header( "location:../error.php");
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['email']=$row['email'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        $msg= $_SESSION['name'].' have logged in.';
        header( "location:../welcome.php?msg=".$msg);
    
  }
}

?>
