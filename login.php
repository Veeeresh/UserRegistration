 <?php
session_start();
include('DB/db.php');
if(empty($_SESSION)){

    $email = $password="";
    $errors = array('email'=>'','password'=>'');
    if(isset($_POST['submit'])){
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);

        //checking user details in databas
        $sql="SELECT email,password FROM user_det WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$sql);
        $num_row=mysqli_num_rows($result);
        if($num_row==1){
            $_SESSION['email']=$email;
            $update="UPDATE user_det SET login = 'online' WHERE email='$email'";
            if(mysqli_query($conn,$update)){
            header('Location:user/profile.php');
        }else{
            echo 'error';
        }
        }else{
            $errors['email']='enter valid email address';
            $errors['password']='enter valid password';
        }
    }//end of submit
}else{
    header('Location:user/profile.php');
}
$page='login';
include('templates/header.php');
?>
<!-- Start of hero -->
<div class="container-fulid hero">
   <div class="container">
   <div class="row offset-md-3" >
   <h2 class="m-3">Login to Your account</h2>
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
   <div class="col-md-6">
   <p class="mt-2">Don't have an account please<a href="register.php">sing_up</a></p>
   </div>
   </form>
   </div>
   </div>
</div>
<!-- end of hero -->
<?php include('templates/footer.php')?>

