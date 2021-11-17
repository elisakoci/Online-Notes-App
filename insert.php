<?php
include "db.php";
if(isset($_POST['submit']))
{    
    $title =$_POST["title"];
    $desc=$_POST["description"];
    $sql="INSERT INTO `notes`(`title`, `description`) VALUES ('$title','$desc')";
     if (mysqli_query($con, $sql)) {
       header("location:index.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
     mysqli_close($con);
}
?>