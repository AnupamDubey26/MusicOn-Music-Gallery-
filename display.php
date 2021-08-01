<?php include 'dbmedia.php' ?>
<?php 
session_start();

if(!isset($_SESSION['fname'])){
  echo "You are logged out :(";
  header('location: ../SignUp/index_home.html');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicOn</title>
    <link rel="shortcut icon" href="sound-waves.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="disp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body style="background-image:url('bg2.png');  background-attachment: fixed; ">
    

<!-- 
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MusicOn</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> -->
<nav class="navbar sticky-top navbar-dark bg-dark" style="background: rgb(0,0,0);
background: linear-gradient(338deg, rgba(0,0,0,0.7458333675266982) 16%, rgba(133,31,196,0.7458333675266982) 86%);">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: white; font-family: 'Playfair Display SC', serif; font-size:30px; margin-left:5px; "><img src="sound-waves.png" style="width: 50px; height:50px; margin:3px;" >MusicOn</a>
    <div>
      <h4 style="color: white; font-family: 'Fuggles', cursive; font-size:50px">Hello, <?php echo $_SESSION['fname']; ?></h4>
    </div>
    <!-- <div>
      <!-- <h4 style="color:white; margin-right:100px;" >LogOut</h4> 
      <img src="logout.png">
    </div>
     -->
    <form class="d-flex" action="display.php" method="POST">
      <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search" style="width: 10rem; border-radius:20px">
      <button class="btn btn-outline-success" type="submit" name="submit" style="width: 3rem; border:none"><img src="search.png"></button>
      <a href="logout.php"><img src="logout.png" class="log-out"style="margin-left:5px; margin-top:3px;"></a>
    </form>
  </div>
 
</nav>
<!-- ------------------------------------------------------------ -->

<?php 

if(isset($_POST['submit'])){
  
  $search = $_POST['search'];
  $sql = "SELECT * FROM media WHERE title LIKE '%".$search."%'"; 
 $r_query = mysqli_query($conn, $sql); 
 
 while ($row = mysqli_fetch_assoc($r_query)){
   ?>
     <div class="card-group" style="justify-content: center; align-items:center" >
     <div class="col-md-3">
          <div class="card " style="margin-top: 8px; background-color:rgba(0,0,0,0.5); border-radius :10px;">
                <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top"  alt="...">
                    <div class="card-body">
                      <p class="card-text" style="color: white; border-bottom: 2px solid yellow;"><?php echo $row['title']; ?></p>
                      <audio controls class="audio-control" >
                      <source src="uploads/<?php echo $row['audio']?>" type="audio/mpeg">
                      </audio>
                  </div>
            </div>
     </div>
     </div>
<?php
 }


}
?>
<!-- ------------------------------------------------------------ -->
    <div class="card-group" >
    <?php
        $dis = "SELECT * FROM media";
        $qu = mysqli_query($conn, $dis);
        if(mysqli_num_rows($qu)>0){
        while($row=mysqli_fetch_array($qu)){
            ?>
            <div class="col-md-2">
              <div class="card " style="margin-top: 8px; background-color:rgba(0,0,0,0.5); border-radius :10px; font-family: 'Righteous', cursive;">
                    <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top"  alt="...">
                    <div class="card-body">
                    <p class="card-text" style="color: white; border-bottom: 2px solid yellow;"><?php echo $row['title']; ?></p>
                    <audio controls class="audio-control" >
                    <source src="uploads/<?php echo $row['audio']?>" type="audio/mpeg">
                    </audio>
                    </div>
              </div>
            </div>
              <?php 
        }
    }

        ?>
        </div>
    <!-- </div> -->

  
</body>
</html>


<script>

function onlyPlayOneIn(container) {
  container.addEventListener("play", function(event) {
  audio_elements = container.getElementsByTagName("audio")
    for(i=0; i < audio_elements.length; i++) {
      audio_element = audio_elements[i];
      if (audio_element !== event.target) {
        audio_element.pause();
      }
    }
  }, true);
}

document.addEventListener("DOMContentLoaded", function() {
  onlyPlayOneIn(document.body);
});

</script>