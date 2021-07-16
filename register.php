<?php
include('DB/db.php');
$page='register';
$name = $email = $phone=$gender=$photo=$age=$password = $cpassword = "";
$errors = array('name'=>'','email'=>'','phone'=>'','gender'=>'','photo'=>'','age'=>'','password'=>'', 'cpassword'=>'');
//start of submit button
if(isset($_POST['submit'])){
  //validation of name
  if(empty($_POST['name'])){
    $errors['name']='Please enter your name';
  }else{
    $name=htmlspecialchars($_POST['name']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
      $errors['name']='The name contains only letter and space';
    }
  }//end of name validation

  //vaildation of email
  if(empty($_POST['email'])){
    $errors['email']='Please enter your email address';
  }else{
    $email=htmlspecialchars($_POST['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['email']='Your email address is not valid';
    }//checking email is exist or not in database
    else{
    $sql="SELECT email FROM user_det WHERE email='".$email."'";
    $result=mysqli_query($conn,$sql);
    $a= mysqli_num_rows($result);
    if($a>=1){
      $errors['email']='email is alreday exist';
  }
  }//end of email exist

  }//end of email validation

  //vaildation of phone
  if(empty($_POST['phone'])){
    $errors['phone']='Please enter your phone number';
  }else{
    $phone=htmlspecialchars($_POST['phone']);
    if(!preg_match("/^[0-9]{10}$/",$phone)){
      $errors['phone']='The entered phone number is not valid. Please enter 10 digit phone number';
    }
  }//end of phone validation

  //vaildation of gender
  if(empty($_POST['gender'])){
    $errors['gender']='Please select your gender';
  }else{
    $gender=htmlspecialchars($_POST['gender']);
  }//end of gender validation

  //validation of photo
  if(empty($_FILES['photo']['name'])){
    $errors['photo']='Please select your profile photo';
  }else{
    $file_name=$_FILES['photo']['name'];
    $file_size=$_FILES['photo']['size'];
    $file_temp=$_FILES['photo']['tmp_name'];
    $file_type=$_FILES['photo']['type'];
    $file_dest="upload/".$file_name;
    move_uploaded_file($file_temp,$file_dest);
  }//end of photo validiation

  //age validation
  if(empty($_POST['age'])){
    $errors['age']='Please enter your age';
  }else{
    $age=htmlspecialchars($_POST['age']);
    if($age>=111){
      $errors['age']='You have entered invalid age';
    }
  }//end of age validation

  //password validation
  if(empty($_POST['password'] || $_POST['cpassword'])){
    $errors['password']='please enter your password';
    $errors['cpassword']='Please conform your password';
}else{
    $password=htmlspecialchars($_POST['password']);
    $cpassword=htmlspecialchars($_POST['cpassword']);
    if($password !== $cpassword){
        // $errors['password']='password not matched';
        $errors['cpassword']='password not matched';
    }
}
  //end of password validation

  //insert data to database
  if(array_filter($errors)){
    // echo 'errors in the form';
}else{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $photo=mysqli_real_escape_string($conn,$file_dest);
    $age=mysqli_real_escape_string($conn,$_POST['age']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    //make query
    $sql="INSERT INTO user_det(name,email,phone,gender,file,age,password) VALUES
                               ('$name','$email','$phone','$gender','$photo','$age','$password')";

    if(!mysqli_query($conn,$sql)){
        echo 'query error';
    }else{
    // echo 'form is submitted';
    header('Location:success.php');
    }
    // echo 'form is valid';
    
}
//end of database 

}//end of submit buttton
include('templates/header.php');

?>
<!-- Start of hero -->
<div class="container-fluid hero">
<div class="container">
<!-- registration form -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group"  method="POST" enctype="multipart/form-data">
<h2 class="text-center">Create Your account</h2>
<div class="row">
<div class="col-md-6">
    <label for="fullname">Full Name</label>
    <input type="text" name="name" class="form-control" placeholder="enter your full name" value="<?php echo $name; ?>">
    <div class="text-danger"><?php echo $errors['name']; ?></div>
</div>
<div class="col-md-6">
    <label for="Email">Email</label>
    <input type="text" name="email" class="form-control" placeholder="enter your email address" value="<?php echo $email; ?>">
    <div class="text-danger"><?php echo $errors['email']; ?></div>
</div>
<div class="col-md-6">
    <label for="Phone">Phone</label>
    <input type="text" name="phone" class="form-control" placeholder="enter your phone number" value="<?php echo $phone; ?>">
    <div class="text-danger"><?php echo $errors['phone']; ?></div>
</div>
<div class="col-md-6">
    <label for="gender">Gender</label>
    <select class="form-control" name="gender" id="">
    <option value="">Please select Gender</option>
    <option <?php if($gender==='male'){echo 'selected';};?> value="male">Male</option>
    <option <?php if($gender==='female'){echo 'selected';};?> value="female">Female</option>
    <option <?php if($gender==='t_gender'){echo 'selected';};?> value="t_gender">Transe Gender</option>
    </select>
    <div class="text-danger"><?php echo $errors['gender']; ?></div>
</div>
 <div class="col-md-6">
 <label for="file">Profile Photo</label>
 <input type="file" name="photo" class="form-control" placeholder="Upload you photo" value="<?php echo $photo; ?>">
 <div class="text-danger"><?php echo $errors['photo']; ?></div>
 
 </div>
 
 <div class="col-md-6">
 <label for="age">Age</label>
 <input type="number" name="age" value="<?php echo $age; ?>" class="form-control" placeholder="Enter your age" min="1" max="200">
 <div class="text-danger"><?php echo $errors['age']; ?></div>
 </div>
 <div class="col-md-6">
 <label for="password">Password</label>
 <input type="password" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Enter your password">
 <div class="text-danger"><?php echo $errors['password']; ?></div>
 </div>
 <div class="col-md-6">
 <label for="cpassword"> Repeat Password</label>
 <input type="password" name="cpassword" value="<?php echo $cpassword; ?>" class="form-control" placeholder="Enter your password">
 <div class="text-danger"><?php echo $errors['cpassword']; ?></div>
 </div>
 <div class="col-12">
 <input type="submit" class="btn btn-success mt-5 text-center" name="submit">
 <p>Aleready Have an account <a href="login.php">Login</a></p>
 </div>
</div>
</form>
</div>
</div>
<!-- end of hero -->
<?php include('templates/footer.php')?>

