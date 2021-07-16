<?php
session_start();
if(empty($_SESSION)){
    header('Location:../login.php');
}else{
include('../DB/db.php');
$page='profile';
$email=$_SESSION['email'];
//get detail of single user
$sql="SELECT * FROM user_det WHERE email='$email'";
$result=mysqli_query($conn,$sql);
//fetch result in array
$user=mysqli_fetch_assoc($result);
include('uheader.php');
}
?>
<div class="col-sm-6">
<div class="container ">
<!-- card start -->

<div class="row">
<div class="col-sm-6">
  
    <img src="../<?php echo $user['file'];?>" alt="profile photo" width="300px" height="300px" >
  </div>
  <div class="col-sm-4">
    <div class="h3">Email:<?php echo $user['email'];?></div>
    <div class="h3">Name:<?php echo $user['name'];?></div>
    <div class="h3">Phone:<?php echo $user['phone'];?></div>
    <div class="h3">age:<?php echo $user['age'];?></div>
    </div>
   
  </div>
  </div>
</div>
<!-- end card start -->
<?php include('ufooter.php');?>
