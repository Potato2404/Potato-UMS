<?php

@include 'db_connect.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>user page</title>
   <style>
      body {
         background-image: url('css/final1.jpg'); 
         background-size: cover; 
         background-position: center; 
      }
      .btn{
      display: inline-block;
      padding:5px 15px;
      font-size: 15px;
      background: #AD5050;
      color:#681F1F;
      margin:0 5px;
      text-transform: capitalize;
      border-radius: 5px;
      justify-content: end;
      align-items: end;
      }
      .btn:hover{
      background: crimson;
      color:#FFF9DE;
      }
      .nav-pills .nav-link {
      display: inline-block;
      padding:5px 15px;
      font-size: 15px;
      color:#FFF9DE;
      margin:0 5px;
      text-transform: capitalize;
      border-radius: 5px;
      }
      .nav-pills .nav-link:hover {
      background-color: crimson; 
      color: #FFF9DE;
       }
      .nav-pills .nav-link.active {
      background-color: crimson;
      color: #FFF9DE;
      }
   </style>
   <style>
      .site-footer
      {
        background-color:#681F1F;
        padding:45px 0 20px;
        font-size:15px;
        line-height:24px;
        color:#737373;
      }
      .site-footer hr
      {
        border-top-color:#bbb;
        opacity:0.5
      }
      .site-footer hr.small
      {
        margin:20px 0
      }
      .site-footer h6
      {
        color:#fff;
        font-size:16px;
        text-transform:uppercase;
        margin-top:5px;
        letter-spacing:2px
      }
      .site-footer a
      {
        color:#737373;
      }
      .site-footer a:hover
      {
        color:#3366cc;
        text-decoration:none;
      }
      .footer-links
      {
        padding-left:0;
        list-style:none
      }
      .footer-links li
      {
        display:block
      }
      .footer-links a
      {
        color:#737373
      }
      .footer-links a:active,.footer-links a:focus,.footer-links a:hover
      {
        color:#3366cc;
        text-decoration:none;
      }
      .footer-links.inline li
      {
        display:inline-block
      }
      .site-footer .social-icons
      {
        text-align:right
      }
      .site-footer .social-icons a
      {
        width:40px;
        height:40px;
        line-height:40px;
        margin-left:6px;
        margin-right:0;
        border-radius:100%;
        background-color:#AD5050
      }

      .social-icons
      {
        padding-left:0;
        margin-bottom:0;
        list-style:none
      }
      .social-icons li
      {
        display:inline-block;
        margin-bottom:4px
      }
      .social-icons li.title
      {
        margin-right:15px;
        text-transform:uppercase;
        color:#96a2b2;
        font-weight:700;
        font-size:13px
      }
      .social-icons a{
        background-color:#eceeef;
        color:#FFF9DE;
        font-size:16px;
        display:inline-block;
        line-height:44px;
        width:44px;
        height:44px;
        text-align:center;
        margin-right:8px;
        border-radius:100%;
        -webkit-transition:all .2s linear;
        -o-transition:all .2s linear;
        transition:all .2s linear
      }
      .social-icons a:active,.social-icons a:focus,.social-icons a:hover
      {
        color:#FFF9DE;
        background-color:#29aafe
      }
      .social-icons.size-sm a
      {
        line-height:34px;
        height:34px;
        width:34px;
        font-size:14px
      }
      .social-icons a.facebook:hover
      {
        background-color:#3b5998
      }
      .social-icons a.twitter:hover
      {
        background-color:#00aced
      }
      .social-icons a.linkedin:hover
      {
        background-color:#007bb6
      }
      .social-icons a.dribbble:hover
      {
        background-color:#ea4c89
      }
      @media (max-width:767px)
      {
        .social-icons li.title
        {
          display:block;
          margin-right:0;
          font-weight:600
        }
      }
   </style>
   <style>
      @import url(https://fonts.googleapis.com/css?family=Montserrat);
      @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
      @import url(https://fonts.googleapis.com/css?family=Open+Sans);
      .snip1540 {
        box-shadow: none !important;
        color: #141414;
        display: inline-block;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 14px;
        line-height: 1.4em;
        margin: 10px;
        max-width: 315px;
        min-width: 230px;
        position: relative;
        text-align: left;
        width: 100%;
      }

      .snip1540 * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }

      .snip1540 .profile-image img {
        border-radius: 5px;
        max-width: 100%;
        height: 80px;
        vertical-align: top;
        float: left;
      }

      .snip1540 figcaption {
        background-color: #681F1F;
        border-radius: 5px;
        color: #fff;
        display: inline-block;
        margin-top: 15px;
        padding: 25px;
        position: relative;
        width: 445px;
      }

      .snip1540 figcaption:after {
        border-color: transparent transparent #681F1F transparent;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        bottom: 100%;
        content: '';
        height: 0;
        left: 32px;
        position: absolute;
        width: 0;
      }

      .snip1540 h3,
      .snip1540 h4,
      .snip1540 p {
        margin: 0 0 5px;
      }

      .snip1540 h3 {
        font-weight: 600;
        font-size: 1.2em;
        font-family: 'Montserrat', Arial, sans-serif;
      }

      .snip1540 h4 {
        color: #8c8c8c;
        font-weight: 400;
        letter-spacing: 2px;
      }

      .snip1540 p {
        font-size: 0.9em;
        letter-spacing: 1px;
        opacity: 0.9;
      }

      .snip1540 .icons {
        padding: 20px 90px;
      }

      .snip1540 i {
        color: #681F1F;
        display: inline-block;
        font-size: 18px;
        font-weight: normal;
        opacity: 0.75;
        padding: 10px 2px;
      }

      .snip1540 i:hover {
        opacity: 1;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
      }
      .social-icons
      {
        padding-left:0;
        margin-bottom:0;
        list-style:none
      }
      .social-icons li
      {
        display:inline-block;
        margin-bottom:4px
      }
      .social-icons li.title
      {
        margin-right:15px;
        text-transform:uppercase;
        color:#96a2b2;
        font-weight:700;
        font-size:13px
      }
      .social-icons a{
        background-color:#AD5050;
        color:#818a91;
        font-size:16px;
        display:inline-block;
        line-height:44px;
        width:44px;
        height:44px;
        text-align:center;
        margin-right:8px;
        border-radius:100%;
        -webkit-transition:all .2s linear;
        -o-transition:all .2s linear;
        transition:all .2s linear
      }
      .social-icons a:active,.social-icons a:focus,.social-icons a:hover
      {
        color:#fff;
        background-color:#FFF9DE;
      }
      .social-icons.size-sm a
      {
        line-height:34px;
        height:34px;
        width:34px;
        font-size:14px
      }
      .social-icons a.facebook:hover
      {
        background-color:#681F1F
      }
      .social-icons a.twitter:hover
      {
        background-color:#681F1F
      }
      .social-icons a.linkedin:hover
      {
        background-color:#681F1F
      }
      .social-icons a.dribbble:hover
      {
        background-color:#681F1F
      }
      @media (max-width:767px)
      {
        .social-icons li.title
        {
          display:block;
          margin-right:0;
          font-weight:600
        }
      }
   </style>
    <style>
      ::-webkit-scrollbar {
      width: 14px;
      }
      
      ::-webkit-scrollbar-thumb {
      background-color: crimson;
      }
      
      ::-webkit-scrollbar-track {
      background-color: #681F1F;
      }
   </style>
   <link rel="stylesheet" href="css/style24.css">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background: #681F1F;">
   <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)"><h4><span style="color: crimson;">P</span><span style="color: #FFF9DE;">OTATO</span></h4></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
         </button>
      <div class="collapse navbar-collapse" id="mynavbar">
         <ul class="nav nav-pills me-auto">
            <li class="nav-item">
               <a class="nav-link active" data-bs-toggle="pill" href="#home">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-bs-toggle="pill" href="#menu1">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-bs-toggle="pill" href="#menu2">About me</a>
            </li>
         </ul>
         <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal">
            Profile
         </button>
         <a href="homepage.html" class="btn">logout</a>
      </div>
   </div>
</nav>

<div class="modal fade" id="myModal">
   <div class="modal-dialog modal-m modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header" style="background: #681F1F;">
         <a class="navbar-brand" href="javascript:void(0)"><h3><span style="color: crimson;">P</span><span style="color: #FFF9DE;">rofile</span></h3></a>
         </div>
         <div class="modal-body">
            <figure class="snip1540">
                  <div class="profile-image"><img style="margin-right: 10px;" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" alt="profile-sample1" />
                     <ul class="social-icons" style="padding-top: 35px;">
                        <li><a class="facebook" style="background-color: #AD5050;" href="#"><i class="fab fa-facebook" style="color: #FFF9DE;"></i></a></li>
                        <li><a class="twitter" style="background-color: #AD5050;" href="#"><i class="fab fa-twitter" style="color: #FFF9DE;"></i></a></li>
                        <li><a class="dribbble" style="background-color: #AD5050;" href="#"><i class="fab fa-dribbble" style="color: #FFF9DE;"></i></a></li>
                        <li><a class="linkedin" style="background-color: #AD5050;" href="#"><i class="fab fa-linkedin" style="color: #FFF9DE;"></i></a></li>   
                     </ul>
                  </div>
                  <figcaption>
                     <h3 style="color: #FFF9DE;"><span style="color: crimson;">N</span>ame: <?php echo $_SESSION['user_name'] ?></h3>
                     <p style="color: #FFF9DE;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur itaque qui nesciunt sunt odit voluptas recusandae labore explicabo, sint consectetur beatae quas error molestias reprehenderit vel. Quo quos quia obcaecati.</p>
                  </figcaption>
               </figure>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<div class="tab-content">
   <div class="tab-pane container active" id="home">
      <div class="container">
         <div class="content">
            <h3 style="color: #FFF9DE;">HELLO <span style="color: #FFF9DE;">user</span></h3>
            <h1 style="color: #FFF9DE;">WELCOME <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p style="color: #FFF9DE;">this is a user page</p>
            <a href="register_form.php" class="btn">Create Account</a>
         </div>
      </div>
   </div>
   <div class="tab-pane container fade" id="menu1">
      
   </div>
   <div class="tab-pane container fade" id="menu2">

   </div>
</div>

  <!-- Site footer -->
  <footer class="site-footer">
      <div class="container1">
         <div class="row ps-4 pe-5" style="margin: 0px;">
            <h6 style="color: #FFF9DE;"><span style="color: crimson;">A</span>bout</h6>
            <p class="text-justify" style="color: #FFF9DE;"
            
            >Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
         </div>
         <hr class="ms-4 me-4">
      </div>
      <div class="container1">
        <p class="copyright-text" style="color: #FFF9DE;"><span style="color: #FFF9DE;"><span style="color: crimson;">C</span>opyright</span> &copy; 2024 All Rights Reserved by Potato Corporation of BSU harvard university.</p>
      </div>
   </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>
</html>