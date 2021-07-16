<?php
include('../DB/db.php');
session_start();
$email=$_SESSION['email'];
$sql="UPDATE user_det SET login='offline' WHERE email='$email'";
if(mysqli_query($conn,$sql)){
    session_destroy();
    header('Location:../index.php');
}else{
    echo 'not loged out';
}
?>