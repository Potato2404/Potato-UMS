<?php

@include 'db_connect.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   // Password validation - Requires at least one number
   if (!preg_match('/[0-9]/', $_POST['password'])) {
       $error[] = 'Password must contain at least one number!';
   }

   $select = " SELECT * FROM user_form WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User already exists!';

   } else {

      if($pass != $cpass){
         $error[] = 'Password not matched!';
      } else {

         // If no errors, insert data into the database
         if(empty($error)) {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
         }
      }
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style24.css">

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3><span style="color: crimson;">r</span>egister <span style="color: crimson;">n</span>ow</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" style="width: 100%;" required placeholder="enter your name">
      <input type="email" name="email" style="width: 100%;" required placeholder="enter your email">
      <input type="password" name="password" style="width: 100%;" required placeholder="enter your password">
      <input type="password" name="cpassword" style="width: 100%;" required placeholder="confirm your password">
      <select name="user_type" style="width: 100%;">
         <option value="user">user</option>
      </select>
      <input type="submit" style="width: 100%;" name="submit" value="register now" class="form-btn">
      <p><span style="color: #FFF9DE;">already have an account?</span> <a href="login.php"><span style="color: crimson;">login now</span></a></p>
   </form>
</div>

</body>
</html>