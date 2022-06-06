
<!DOCTYPE html>
<html lang="en">


<?php require 'Include/head.php'; ?>
<body>

<?php require 'Include/header.php'; ?>

<?php require 'message.php'; ?>
<form style="margin-left:20%;margin-right:20%" action="file/reguser.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"  required>

    <label for="psw"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name"  required>

    <label for="psw"><b>Phone number</b></label>
    <input type="text" placeholder="Enter Mobile Number" name="phone"  required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw"  required>

    <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat"  required> -->
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="regbtn" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
<div>
</div>
<?php require 'Include/footer.php'; ?>
</body>
</html>
 

