<?php session_start() ?>

<!DOCTYPE html>    
<html>    
<head>    
<title>MusicOn-LoginForm</title>
    <link rel="shortcut icon" href="./images/sound-waves.png">   
    <link rel="stylesheet" type="text/css" href="./css/loginstyle.css">    
</head>    
<body>  
<?php    
 
include 'dbcon.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email_search = "select * from registration where email ='$email'";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        $_SESSION['fname'] = $email_pass['fname'];  //username stored

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            echo "Login Successful";
            ?>
            <script>
                location.replace("../media/display.php");
            </script>
            <?php

        }else{
            echo "password Incorrect";
            ?>
            <script>
                alert('Password Incorrect :(');
            </script>
            <?php
        }
    }else{ 
        echo "Invalid Email";
        ?>
        <script>
            alert('Invalid Emial :(');
        </script>
        <?php
    }
}


?>

    <!-- <h2>Login Page</h2><br>    
    <div class="login">    
    <form id="login" method="POST" action="">    
        <label><b>Email    
        </b>    
        </label>    
        <input type="text" name="email" id="Uname" placeholder="Email" required>    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="password" id="Pass" placeholder="Password" required>    
        <br><br>    
       
        <button type="submit" name="submit" class="log">Register</button>     
        <br><br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>    
        Forgot <a href="#">Password</a>    
    </form>      -->

    <form id="login" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
    <div class="wrap1">
            <div class="circle1">
            </div>
            <a href="index_home.html"><img src="./images/sound-waves.png" ></a>
        </div>
<center>
    <div class="login-box">
        <div class="circle2">
            <img src="./images/login.png" class="login-logo">
        </div>
    <div class="login">
     <h1>Sign-In</h1>
    <div class="textbox">
     
        <img src="./images/user.png" class="logo">
        <input type="text" placeholder="MusicOn I'd" name="email" required>
    </div>
    <div class="textbox">
        <img src="./images/padlock.png" class="logo">
        <input type="Password" placeholder="Secret Code" name="password" required>
    </div>
    <!-- <input class="btn" type="button" name="submit" value="Sign In"> -->
    <button type="submit" class="btn" name="submit" class="log">Login</button>
    <h5>Don't have an account? <a href="registration.php" class="sign"> Sign-Up</a></h5>
    </div>
    </div>
    </center>

     <div class="wrap2">
    <div class="circle3"></div>
 </div>

   </form>

</div>    
</body>    
</html>     