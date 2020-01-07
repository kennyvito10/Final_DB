<?php  
include("database/config.php");


if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  if($email == 'admin' && $password == 'pass'){
    header("Location: admin_members.php");
  }else{
    header("Location: admin.php?failed");

  }
}

  

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FP DB</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/smoothScroll.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <style>

    .video-container {
      position: relative;
    }

    .overlay-desc {
      background: rgba(0,0,0,0);
      position: absolute;
      top: 0; right: 0; bottom: 0; left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 100px
    }

    .btn-ticket{
      background-color: #effd5f;
      color: black;
      border: 2px solid black;
    }
    .btn-ticket:hover{
      background-color: white;
      color: black;
      border: 2px solid black;

    }

    .btn-buy{
      background-color: black;
      color: white;
      border: 2px solid grey;
    }
    .btn-buy:hover{
      background-color: white;
      color: black;
      border: 2px solid black;

    }
    .overlay {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.7);
      transition: opacity 500ms;
      visibility: hidden;
      opacity: 0;
    }
    .overlay:target {
      visibility: visible;
      opacity: 1;
    }

    .popup {
      margin: 100px auto;
      padding: 20px;
      background: #fff;
      border-radius: 5px;
      width: 30%;
      position: relative;
      transition: all 5s ease-in-out;
    }

    .popup h2 {
      margin-top: 0;
      color: #333;
    }
    .popup .close {
      position: absolute;
      top: 20px;
      right: 30px;
      transition: all 200ms;
      font-size: 30px;
      font-weight: bold;
      text-decoration: none;
      color: #333;
    }
    .popup .close:hover {
      color: red;
    }
    .popup .content {
      max-height: 30%;
      overflow: auto;
    }

    @media screen and (max-width: 700px){
      .box{
        width: 70%;
      }
      .popup{
        width: 70%;
      }

    }
    div.card {
        box-shadow: 0 4px 8px 0 rgba(255,255,255, 0.5), 0 6px 20px 0 rgba(255,255,255, 0.5);
    }
    .btn-delete {
    background-color: #F95F62;

    }
    .btn-delete:hover{
    background-color: #FA3C40
    }


  </style>

</head>


<body style="background-color: black;  outline: solid black 1px !important;
">


  <div class="video-container">
    <div class="row" style="padding: 20px;position: absolute;z-index:10;">

      <div class="col-md-12">
        
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand " href="index.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">HOME</button>
          </a>
        </nav>
      </div>

    </div>  
      <img style="width: 100%;opacity: 0.8" src="rabbids.gif" alt="">
      
      <div class="overlay-desc">
        <form action="" method="post" >
          <div class="form-group">
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
          </div>
            <button type="submit" name="login" class="btn-ticket" style="width: 100%;border-radius: 6px">Login</button>
        </form>
      </div>
     
  </div>  
</body>
</html>