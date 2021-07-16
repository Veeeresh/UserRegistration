<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Coustom CSS -->
    <link rel="stylesheet" href="../style.css">
    <title>Hospital</title>
  </head>
  <body>
      <!-- Start of nav -->
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Hospital</span>
            <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
 
  
</ul>
        </div>
</nav> 
<!-- end of nav -->
<div class="container-fulid hero">
<div class="row">
<nav class="col-sm-2 bg-white hero py-5"> 
<ul class="nav flex-column py-2 ">
<li class="nav-item">
<a class="nav-link <?php if($page=='profile'){echo 'active';};?> " href="profile.php">Profile</a>
</li>
<li class="nav-item">
<a class="nav-link <?php if($page=='user_edite'){echo 'active';};?>" href="user_edite.php">Edite Profile</a>
</li>
<li class="nav-item">
<a class="nav-link <?php if($page=='uchange_p'){echo 'active';};?> " href="uchange_p.php">change password</a>
</li>
<li class="nav-item">
<a class="nav-link " href="ulogout.php">Logout</a>
</li>
</ul>
</nav>