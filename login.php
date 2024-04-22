<?php

@include 'db_connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
   $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
   $pass = isset($_POST['password']) ? md5($_POST['password']) : '';
   $cpass = isset($_POST['cpassword']) ? md5($_POST['cpassword']) : '';
   $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:index_admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:index_user_page.php');

      }
     
   }else{
      $error[] = 'Incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style24.css">

   <style>
   .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #AD5050;
   color:#681F1F;
   text-transform: capitalize;
   border-radius: 5px;
   text-align: center;
   }

   .btn:hover{
   background: crimson;
   color:#FFF9DE;
   }
   </style>

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3><span style="color: crimson; ">l</span>ogin <span style="color: crimson;">n</span>ow</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" style="width: 100%;" name="email" required placeholder="enter your email">
      <input type="password" style="width: 100%;" name="password" required placeholder="enter your password">
      <div class="form-check" >
         <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something">
         <label class="form-check-label" style="color: #FFF9DE;"><span>remember me</span></label>
      </div>
      <input type="submit" style="width: 100%;" name="submit" value="login now" class="form-btn">
      <a href="register_form.php" class="btn" style="width: 100%;">Create account</a>
      <p style="margin-top: 10px;"><a href="forgot-password.php"><span style="color: crimson; margin-top: -10px;">forgot password?</span></a></p>
   </form>
</div>

</body>
</html>