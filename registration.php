<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicOn-SignUp</title>
    <link rel="shortcut icon" href="./images/sound-waves.png">
    <link rel="stylesheet" href="./css/regisStyle.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<?php

include 'dbcon.php'; 

if(isset($_POST['submit'])){
$fname = mysqli_real_escape_string( $con, $_POST['fname']);
$email =  mysqli_real_escape_string($con, $_POST['email']);
$password =  mysqli_real_escape_string ( $con, $_POST['password']);

$pass = password_hash($password, PASSWORD_BCRYPT);

$emailquery = " select * from  registration where email='$email' ";
$query = mysqli_query($con,$emailquery);

$emailcount = mysqli_num_rows($query);

if($emailcount>0){
    echo "email already exists";
}else{
    //if($password === $cpassword){}
    $insertquery = "insert into registration( fname, email, password) values('$fname','$email','$pass')";

    $iquery = mysqli_query($con, $insertquery);
    ?>
     <script>
                location.replace("login.php");
            </script>
            <?php


}
}

?>
<!-- <form action="" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>Full Name</b></label>
    <input type="text" placeholder="Full Name" name="fname" id="fname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div> -->

  
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
    <div class="contanier">
        
        <h1>Sign-Up</h1>
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input class="input-field" type="text" placeholder="Username" name="fname" required>
        </div>
      
        <div class="input-container">
          <i class="fa fa-envelope icon"></i>
          <input class="input-field" type="text" placeholder="Email" name="email" required>
        </div>
      
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input class="input-field" type="password" placeholder="Secret Code" name="password" required>
        </div>
      
        <button type="submit" class="btn" name="submit">Register</button>

        <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </div>
      </form>
     
</form>
</body>
</html>