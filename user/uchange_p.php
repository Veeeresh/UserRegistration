<?php
session_start();
if(empty($_SESSION)){
    header('Location:../login.php');
}else{
$page='uchange_p';
include('../DB/db.php');
$password=$cpassword="";
$success=array('suc'=>'','unsuc'=>'');
$errors=array('password'=>'','cpassword'=>'');
if(isset($_POST['update'])){
    //new password validation
    if(empty($_POST['password'])){
        $errors['password']='Please enter your password';
    }else{
        $password=htmlspecialchars($_POST['password']);
    }//end of password

    //comform password validation
    if(empty($_POST['cpassword'])){
        $errors['cpassword']='Please conform your password';
    }else{
        $cpassword=htmlspecialchars($_POST['cpassword']);
    }if($password!==$cpassword){
        $errors['cpassword']='Passwrod not matched';
    }
    //end of coform password
    if(array_filter($errors)){
        echo 'errors in the form';
    }else{
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
        $email=$_SESSION['email'];

        //update query
        $update="UPDATE user_det SET password = '$password' WHERE email='$email'";
            if(mysqli_query($conn,$update)){
                $success['suc']='Updated successfully';
            }else{
                $success['unsuc']='Not updated';
            }
    }
}
}
include('uheader.php');
?>

<!-- change password -->
<div class="col-sm-6">
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group" method="POST">
<div class="row mt-3">
<div class=" alert text-primary"><?php echo $success['suc']; ?></div>
<div class=" alert text-primary"><?php echo $success['unsuc']; ?></div>

<label for="email" class="col-form-label col-sm-4">Change Password:</label>
<div class="col-md-6">
<input type="password" name="password" class="form-control" placeholder="Enter your new password" value="<?php echo $password;?>">
<div class="text-danger"><?php echo $errors['password']; ?></div>
</div>
</div>
<div class="row mt-3">
<label for="Name" class="col-form-label col-sm-4">Conform Password:</label>
<div class="col-md-6">
<input type="password" name="cpassword" class="form-control" placeholder="Please coform your password" value="<?php echo $cpassword;?>">
<div class="text-danger"><?php echo $errors['cpassword']; ?></div>
</div>
</div>

<div class="col-sm-10">
<input type="submit" name="update" value="update" class="form-control btn btn-primary mt-3">
</div>
</form>
</div>
</div>
<!-- end of change password -->