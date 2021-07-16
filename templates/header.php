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
    <a class="nav-link <?php if($page=='login'){echo 'active';};?>" href="login.php">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($page=='register'){echo 'active';};?>" href="register.php">Sign-Up</a>
  </li>
  
</ul>
        </div>
</nav> 
<!-- end of nav -->
