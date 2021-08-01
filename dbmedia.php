<?php

$server = "localhost";
$user = "root";
$password = "";
$db ="mg-signup";

$conn = mysqli_connect($server, $user, $password, $db);

if($conn){
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