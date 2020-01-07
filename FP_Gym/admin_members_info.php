<?php 
session_start();
include("database/config.php");
$_SESSION['sub_total'] = 0;

if (isset($_GET["billID"])) {
  $_SESSION['billID']  = $_GET["billID"];

$queryGetAddress = mysqli_query($connection,"SELECT * FROM address, customer , bill WHERE address.addressID = customer.addressID AND bill.customerID = customer.customerID and bill.billID = {$_SESSION['billID']}");
if (mysqli_num_rows($queryGetAddress) > 0) { 
  while ($row=mysqli_fetch_array($queryGetAddress)) {
        $_SESSION['address'] = $row['address'];
        $_SESSION['district'] = $row['district'];
        $_SESSION['city'] = $row['city'];
        $_SESSION['province'] = $row['province'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];        
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
  }
  }
  $queryGetBill = mysqli_query($connection,"SELECT * FROM bill, branch WHERE bill.branchID = branch.branchID and bill.billID = {$_SESSION['billID']}");
  if (mysqli_num_rows($queryGetBill) > 0) { 
  while ($row=mysqli_fetch_array($queryGetBill)) {
        $_SESSION['billDate'] = $row['billDate'];
        $_SESSION['branchName'] = $row['branchName'];
  }
  }

    $queryGetBillDetail = mysqli_query($connection,"SELECT * FROM product, bill_detail, personal_trainer 
                                                              WHERE product.productID = bill_detail.productID AND personal_trainer.positionID  = product.productID AND bill_detail.billID = {$_SESSION['billID']}");



  #$query1 = mysqli_query($connection,"SELECT * FROM Bill,Branch, Employee WHERE Bill.bill_id = $billID AND Branch.branch_id = Bill.branch_id AND Employee.employee_id = Bill.employee_id");

  #if (mysqli_num_rows($query1) > 0) { 
      #while ($row=mysqli_fetch_array($query1)) {
        #$_SESSION['branch_name'] = $row['branch_name'];
        #$_SESSION['bill_date'] = $row['bill_date'];
        #$_SESSION['employee_name'] = $row['employee_name'];
      #}
  #}


}
#$query = mysqli_query($connection,"SELECT * FROM Bill,Bill_Detail, Branch, Product
                  # WHERE Bill_Detail.bill_id = $billID ");
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
    <div class="row" style="padding: 0px 390px;margin-top: 30px">
      <div class="col-md-6">
        <p>Bill ID : <?php echo $_SESSION['billID']; ?></p>
      </div>
      <div class="col-md-6" style="text-align: right">
        <p>Bill Date : <?php echo $_SESSION['billDate']; ?></p>

      </div>
    </div>
    <div class="row" style="padding: 0px 390px">
      <div class="col-md-6">
        <p>Mr. <?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?></p>
      </div>
      <div class="col-md-6" style="text-align: right">
        <p>Branch : <?php echo $_SESSION['branchName']; ?></p>

      </div>
    </div>
    <div class="row" style="padding: 0px 390px">
      <div class="col-md-6">
        <p>Date Of Birth :  <?php echo $_SESSION['dob']; ?> </p>
      </div>
      <div class="col-md-6" style="text-align: right">
        <p>Email : <?php echo $_SESSION['email']; ?></p>

      </div>
      
    </div>


    <div class="row" style="padding: 0px 390px">
      <div class="col-md-6">
        <p>Phone : <?php echo $_SESSION['phone']; ?> </p>
      </div>
    </div>

          
    <div class="row" style="padding: 0px 400px">
      <div class="col-md-12" style="background-color: white;padding: 20px">
          <table class="table" style="text-align: center">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Package</th>
                  <th scope="col">Months</th>
                  <th scope="col">Price</th>
                  <th scope="col">Trainer</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $num = 1;
                if (mysqli_num_rows($queryGetBillDetail) > 0) { 
                    while ($row=mysqli_fetch_array($queryGetBillDetail)) { ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row["productName"] ;?></td>
                  <td><?php echo $row["qty"]; ?></td>
                  <td>Rp. <?php echo $row["price"] ;?> </td>
                  <td><?php echo $row["name"]; ?></td>
                  
                </tr>

<?php $num+=1;
  $_SESSION['sub_total'] += $row["qty"] * $row["price"] ;



}} ?>
              </tbody>
            </table>
            <div class="row" style="text-align: right;padding-right: 20px">
              <div class="col-md-12">
                <p> Total Price : Rp. <?php echo $_SESSION['sub_total']  ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="" style="margin-left: 2px;font-size: 12px">Address  </label>
              </div>
            </div>
            <div class="row" style="margin-top: -10px">
              <div class="col-md-12">
                <p><?php echo $_SESSION['address']; ?> , <?php echo $_SESSION['district']; ?> , <?php echo $_SESSION['city']; ?>, <?php echo $_SESSION['province']; ?>, <?php echo $_SESSION['country']; ?></p>
              </div>
            </div>
          <a href="admin_members.php">
          <button type="submit" name="bill" class="btn btn-ticket" style="width: 100%">BACK TO MEMBERSHIP</button>

          </a>
      </div>
    </div>

</body>
</html>