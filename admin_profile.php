<?php
session_start();
include('DB/db.php');
if(empty($_SESSION)){
  header('Location:admin_login.php');
}else{

//getting data from database
$sql="SELECT * FROM user_det";
$result=mysqli_query($conn,$sql);
$users=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Coustom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Hospital</title>
  </head>
  <body>
      <!-- Start of nav -->
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Hospital</span>
            <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="admin_logout.php">Admin-Logout</a>
  </li>
  
  
</ul>
        </div>
</nav> 
<!-- end of nav -->
<!-- Start of hero -->
<div class="container-fulid hero">
   <div class="container">
   <!-- table content -->
   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Patient Id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">email</th>
      <th scope="col">Gender</th>
      <th scope="col">Photo</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user){?>
    <tr>
      <th scope="row"><?php echo $user['id'];?></th>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['phone'];?></td>
      <td><?php echo $user['email'];?></td>
      <td><?php echo $user['gender'];?></td>
      <td><img src="<?php echo $user['file'];?>" alt="user profile photo" width="200px"; height="100px"; ></td>
      <td><?php echo $user['login'];?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
   <!-- end of table content -->
   </div>
</div>
<!-- end of hero -->
<?php include('templates/footer.php')?>
