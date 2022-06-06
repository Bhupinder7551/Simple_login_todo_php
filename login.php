
<!DOCTYPE html>
<html lang="en">


<?php require 'Include/head.php'; ?>

<body>

<?php require 'Include/header.php'; ?>

<?php require 'message.php'; ?>
<form style="margin-left:20%;margin-right:20%" action="file/loginuser.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Login</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw"  required>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="rlogin" class="registerbtn">Login</button>
  </div>
  
  <div class="container signin">
    <p>Do not have an account? <a href="reg.php">Sign up</a>.</p>
  </div>
</form>
<?php require 'Include/footer.php'; ?>
</body>
</html>
 
