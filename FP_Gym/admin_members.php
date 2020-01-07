<?php 
session_start();
include("database/config.php");
$queryGetHistory = mysqli_query($connection,"SELECT * FROM bill, customer WHERE customer.customerID = bill.customerID ");



if (isset($_POST['searchbutton'])) {
    header("Location:admin_members_info.php?billID={$_POST['search']}");
    
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


<body style="background-color: #fffdd0;">

    <div class="row" style="padding: 20px;  outline: solid black 1px !important">

      <div class="col-md-11">
        
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand " href="admin_members.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">MEMBERS</button>
          </a>
          <a class="navbar-brand " href="admin_trainers.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">TRAINERS</button>
          </a>
          <a class="navbar-brand " href="admin_branch.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">BRANCH</button>
          </a>
          <a class="navbar-brand " href="admin_package.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">PACKAGE</button>
          </a>
        </nav>
      </div>
      <div class="col-md-1" style="margin-left: -50px">
        
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand " href="index.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">LOGOUT</button>
          </a>
        </nav>
      </div>

    </div>  

    <div class="row" style="margin-top: 50px">
      <div class="col-md-12" style="text-align: center">
      <h1>MEMBERSHIP DETAIL</h1>

      </div>
    </div>
    <div class="row" style="padding: 30px 300px">
      <div class="col-md-12">
        <form class="form-inline" action="" method="post">
          <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button name="searchbutton" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      
      <div class="col-md-12" style="margin-top: 20px">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Date Joined</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php  
          if (mysqli_num_rows($queryGetHistory) > 0) { 
            while ($row=mysqli_fetch_array($queryGetHistory)) {

          ?>
            <tr>
              <th scope="row"> <?php echo $row["billID"] ?> </th>
              <td><?php   echo $row["firstName"] ?></td>
              <td><?php   echo $row["lastName"] ?></td>
              <td><?php   echo $row["billDate"] ?></td>
                <td style="width: 100px">
                 <a href="admin_members_info.php?billID=<?php echo $row["billID"] ?>">
                  <button style="width: 100%" type="button" class="btn-ticket">Info</button>
                </a>
              </td>
              
            </tr>
          <?php }} ?>
          </tbody>
        </table>

        
      </div>
    </div>


</body>
</html>