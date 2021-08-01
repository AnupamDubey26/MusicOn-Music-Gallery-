<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="5">
    <form method="POST" enctype="multipart/form-data">
        <tr><td>image</td>
            <td>
        <input type="file" name="img"></td>
        </tr>
       
         <tr><td>audio</td>
       <td>
        <input type="file" name="audio"></td>
       </tr> 

       <tr><td>Title</td>
       <td>
        <input type="text" name="title"></td>
       </tr>

        <tr><td>
        <input type="submit" name="submit">
        </td></tr>
    </form>
    </table>
</body>
</html>

<?php

include 'dbmedia.php';

if(isset($_POST['submit'])){
    $title=mysqli_real_escape_string( $conn, $_POST['title']);
    $img=$_FILES['img']['name'];
    $tempname=$_FILES['img']['tmp_name'];

    $audio = $_FILES['audio']['name'];
    $tempaudio = $_FILES['audio']['tmp_name'];

    $insertquery = "insert into media(image,title,audio) values('$img','$title','$audio')";
    $iquery = mysqli_query($conn, $insertquery);

    move_uploaded_file($tempname,"uploads/".$img);
    move_uploaded_file($tempaudio,"uploads/".$audio);
}


?>