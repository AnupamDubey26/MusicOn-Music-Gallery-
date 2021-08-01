<?php

$server = "localhost";
$user = "root";
$password = "";
$db ="mg-signup";

$con = mysqli_connect($server, $user, $password, $db);

if($con){
    ?>
      <script>
          alert("Connection Successful");
      </script>

    <?php
}else{
    ?>
    <script>
        alert("Not connected");
    </script>

  <?php
}
?>