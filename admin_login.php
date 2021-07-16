<?php
session_start();
include('DB/db.php');

    $email = $password="";
    $errors = array('email'=>'','password'=>'');
    if(isset($_POST['submit'])){
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);

        //checking user details in databas
        $sql="SELECT a_email,a_password FROM admin_det WHERE a_email='$email' AND a_password='$password'";
        $result=mysqli_query($conn,$sql);
        $num_row=mysqli_num_rows($result);
        if($num_row==1){
            $_SESSION['email']=$email;
            header('Location:admin_profile.php');
        
        }else{
            $errors['email']='enter valid email address';
            $errors['password']='enter valid password';
        }
    }//end of submit

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
            <a href="index.php" class="nav-link" ><span class="navbar-brand mb-0 h1">Hospital</span></a>
            <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="admin_login.php">Admin-Login</a>
  </li>
  
  
</ul>
        </div>
</nav> 
<!-- end of nav -->
<!-- Start of hero -->
<div class="container-fulid hero">
   <div class="container">
   <div class="row offset-md-3" >
   <h2 class="m-3">Admin Login</h2>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group" method="POST">
   <div class="col-md-6">
   <label for="email" class="form-label">Email</label>
   <input type="text" class="form-control" name="email" placeholder="Plese enter your register email address">
   <div class="text-danger"><?php echo $errors['email']; ?></div>
   </div>
   <div class="col-md-6">
   <label for="password" class="form-label">password</label>
   <input type="password" class="form-control" name="password" placeholder="Plese enter your password">
   <div class="text-danger"><?php echo $errors['password']; ?></div>
   </div>
   <div class="col-md-6">
   <input type="submit" class="form-control btn btn-success mt-3" name="submit">
   </div>
   
   </form>
   </div>
   </div>
</div>
<!-- end of hero -->
<?php include('templates/footer.php')?>

