<?php 
session_start();
include("database/config.php");
$queryGetBranch = mysqli_query($connection,"SELECT * FROM branch , address
                                            WHERE branch.addressID = address.addressID ");

if (isset($_POST['addbutton'])) {

  $itemname = mysqli_real_escape_string($connection, $_POST['bname']);
  $itemcountry = mysqli_real_escape_string($connection, $_POST['country']);
  $itempostcode = mysqli_real_escape_string($connection, $_POST['postcode']);
  $itemprovince = mysqli_real_escape_string($connection, $_POST['province']);
  $itemdistrict = mysqli_real_escape_string($connection, $_POST['district']);
  $itemcity = mysqli_real_escape_string($connection, $_POST['city']);
  $itemaddress = mysqli_real_escape_string($connection, $_POST['address']);
  $queryadd = "INSERT INTO address 
      (country,postalCode,province,district,city,address) 
      VALUES 
      ( '$itemcountry' , '$itempostcode' ,'$itemprovince','$itemdistrict','$itemcity','$itemaddress' ) ";
      mysqli_query($connection, $queryadd);

  $queryGetAddressID = mysqli_query($connection,"SELECT * FROM address WHERE addressID=(SELECT max(addressID) FROM address);");

  if (mysqli_num_rows($queryGetAddressID) > 0) { 
          while ($row=mysqli_fetch_array($queryGetAddressID)) {
                  $_SESSION['addressID'] = $row['addressID'];
          }
                  

          
        }
   $queryaddbranch = "INSERT INTO branch 
      (branchName,addressID) 
      VALUES 
      ( '$itemname', {$_SESSION['addressID']}) ";
      mysqli_query($connection, $queryaddbranch);

    header("Location: admin_branch.php");

}

if (isset($_POST['search'])) {
  $query_search = mysqli_query($connection,"SELECT * FROM Bill WHERE bill_id = {$_POST['searchID']}");
  if (mysqli_num_rows($query_search) > 0) { 
      while ($row=mysqli_fetch_array($query_search)) {
    header("Location:history_detail.php?billID={$_POST['searchID']}");
    }
  }
  else{
    header("Location:history.php?notFound");

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
      <h1>BRANCH MANAGEMENT</h1>

      </div>
    </div>
    <div class="row" style="padding: 30px 150px">
      <div class="col-md-8">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Country</th>
              <th scope="col">Postal Code</th>
              <th scope="col">Province</th>
              <th scope="col">District</th>
              <th scope="col">City</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php  
          if (mysqli_num_rows($queryGetBranch) > 0) { 
            while ($row=mysqli_fetch_array($queryGetBranch)) {

          ?>
            <tr>
              <th scope="row">  <?php echo $row["branchID"] ?> </th>
              <td> <?php echo $row["branchName"] ?></td>
              <td> <?php echo $row["country"] ?></td>
              <td> <?php echo $row["postalCode"] ?></td>
              <td> <?php echo $row["province"] ?></td>
              <td> <?php echo $row["district"] ?></td>
              <td> <?php echo $row["city"] ?></td>
              <td>  <?php echo $row["address"] ?></td>
              <td style="width: 100px">
                <a href="action/delete_branch.php?branchID= <?php echo $row["branchID"] ?>">
                  <button style="width: 100%" type="button" class="btn-ticket">Delete</button>
                </a>
              </td>
              
            </tr>
          <?php }} ?>
            
          </tbody>
        </table>

        
      </div>
        <div class="col-md-4" style="background-color: white;padding: 20px;height: 470px;outline: solid black 1px !important">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" name="bname" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <input type="text" name="country" class="form-control" id="exampleInputEmail1" placeholder="Country">
            </div>
            <div class="form-group">
              <input type="text" name="postcode" class="form-control" id="exampleInputEmail1" placeholder="Postal Code">
            </div>
            <div class="form-group">
              <input type="text" name="province" class="form-control" id="exampleInputEmail1" placeholder="Province">
            </div>
            <div class="form-group">
              <input type="text" name="district" class="form-control" id="exampleInputEmail1" placeholder="District">
            </div>
            <div class="form-group">
              <input type="text" name="city" class="form-control" id="exampleInputEmail1" placeholder="City">
            </div>
            <div class="form-group">
                  <textarea style="font-size: 14px" placeholder="Address" name="address" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
          
            <button type="submit" name="addbutton" class="btn btn-ticket" style="width: 100%">Add Branch</button>
          </form>
        </div>
    </div>
  
  

</body>
</html>