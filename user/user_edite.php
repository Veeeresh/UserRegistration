<?php
session_start();
if(empty($_SESSION)){
    header('Location:../login.php');
}else{
$page='user_edite';
include('../DB/db.php');
$email=$_SESSION['email'];
//get detail of single user
$sql="SELECT * FROM user_det WHERE email='$email'";
$result=mysqli_query($conn,$sql);
//fetch result in array
$user=mysqli_fetch_assoc($result);
$name=$user['name'];
$phone=$user['phone'];
$age=$user['age'];

//update the data
$name = $phone=$age =$suc=$unsuc="";
$errors = array('name'=>'','phone'=>'','age'=>'');
$success=array('suc'=>'','unsuc'=>'');
if(isset($_POST['update'])){

    //validation of name
  if(empty($_POST['name'])){
    $errors['name']='Please enter your name';
  }else{
    $name=htmlspecialchars($_POST['name']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
      $errors['name']='The name contains only letter and space';
    }
  }//end of name validation

  //vaildation of phone
  if(empty($_POST['phone'])){
    $errors['phone']='Please enter your phone number';
  }else{
    $phone=htmlspecialchars($_POST['phone']);
    if(!preg_match("/^[0-9]{10}$/",$phone)){
      $errors['phone']='The entered phone number is not valid. Please enter 10 digit phone number';
    }
  }//end of phone validation

  //age validation
  if(empty($_POST['age'])){
    $errors['age']='Please enter your age';
  }else{
    $age=htmlspecialchars($_POST['age']);
    if($age>=111){
      $errors['age']='You have entered invalid age';
    } 
  }//end of age validation

  if(array_filter($errors)){
    //   echo 'errors in the form';

  }else{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $age=mysqli_real_escape_string($conn,$_POST['age']);

    //update query
    $update="UPDATE user_det SET name = '$name', phone='$phone', age='$age' WHERE email='$email'";
            if(mysqli_query($conn,$update)){
                $success['suc']='Updated successfully';
            }else{
                $success['unsuc']='Not updated';
            }
    

  }
    

}//end of update
}
include('uheader.php');
?>
<!-- edite profile card -->
<div class="col-sm-6">
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group" method="POST">
<div class="row mt-3">
<div class=" alert text-primary"><?php echo $success['suc']; ?></div>
<div class="text-danger"><?php echo $success['unsuc']; ?></div>
<label for="email" class="col-form-label col-sm-2">Email:</label>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="<?php echo $email; ?>" disabled>

</div>
</div>
<div class="row mt-3">
<label for="Name" class="col-form-label col-sm-2">Name:</label>
<div class="col-md-6">
<input type="text" name="name" class="form-control" placeholder="<?php echo $user['name'];?>" value="<?php echo $name;?>">
<div class="text-danger"><?php echo $errors['name']; ?></div>
</div>
</div>
<div class="row mt-3">
<label for="phone" class="col-form-label col-sm-2">Phone:</label>
<div class="col-md-6">
<input type="text" name="phone" class="form-control" placeholder="<?php echo $user['phone'];?>" value="<?php echo $phone;?>">
<div class="text-danger"><?php echo $errors['phone']; ?></div>
</div>
</div>
<div class="row mt-3">
<label for="age" class="col-form-label col-sm-2">Age:</label>
<div class="col-md-6">
<input type="text" name="age" class="form-control" placeholder="<?php echo $user['age']; ?>" value="<?php echo $age;?>">
<div class="text-danger"><?php echo $errors['age']; ?></div>
</div>
</div>
<div class="col-sm-8">
<input type="submit" name="update" value="update" class="form-control btn btn-primary mt-3">
</div>
</form>
</div>
</div>
<!-- edn of edite profile card -->