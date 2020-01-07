<?php  
session_start();
include("database/config.php");


if(isset($_POST['biodata'])){

  $_SESSION['first_name'] = mysqli_real_escape_string($connection, $_POST['first_name']);
  $_SESSION['last_name'] = mysqli_real_escape_string($connection, $_POST['last_name']);
  $_SESSION['dob'] = mysqli_real_escape_string($connection, $_POST['date']);
  $_SESSION['gender'] = mysqli_real_escape_string($connection, $_POST['gender']);
  $_SESSION['email'] = mysqli_real_escape_string($connection, $_POST['email']);
  $_SESSION['phone'] = mysqli_real_escape_string($connection, $_POST['phone']);

  if($_SESSION['gender'] == 'Male'){
      $_SESSION['gends'] = 'Mr.';
  }else{
      $_SESSION['gends'] = 'Mrs.';

  }


    header("Location: join_membership.php?membership");

}

if(isset($_POST['membership'])){
  $_SESSION['date'] = date('Y/m/d', time());


  $_SESSION['package'] = mysqli_real_escape_string($connection, $_POST['package']);
  $_SESSION['qty'] = mysqli_real_escape_string($connection, $_POST['qty']);
  $_SESSION['branch'] = mysqli_real_escape_string($connection, $_POST['branch']);
  $_SESSION['country'] = mysqli_real_escape_string($connection, $_POST['country']);
  $_SESSION['postalCode'] = mysqli_real_escape_string($connection, $_POST['postalCode']);
  $_SESSION['province'] = mysqli_real_escape_string($connection, $_POST['province']);
  $_SESSION['district'] = mysqli_real_escape_string($connection, $_POST['district']);
  $_SESSION['city'] = mysqli_real_escape_string($connection, $_POST['city']);
  $_SESSION['address'] = mysqli_real_escape_string($connection, $_POST['address']);




  $queryGetBranchName = mysqli_query($connection,"SELECT * FROM branch WHERE branchID = {$_SESSION['branch']}");

  if (mysqli_num_rows($queryGetBranchName) > 0) { 
          while ($row=mysqli_fetch_array($queryGetBranchName)) {
                  $_SESSION['branchName'] = $row['branchName'];
          }
                  

          
        }

  $queryAddAddress = "INSERT INTO address 
      (country , postalCode, province, district, city, address) 
      VALUES 
      ( '{$_SESSION['country']}' , '{$_SESSION['postalCode']}' , '{$_SESSION['province']}', '{$_SESSION['district']}' , '{$_SESSION['city']}' , '{$_SESSION['address']}' ) ";
      mysqli_query($connection, $queryAddAddress);






  $queryGetAddressID = mysqli_query($connection,"SELECT * FROM address WHERE addressID=(SELECT max(addressID) FROM address);");

  if (mysqli_num_rows($queryGetAddressID) > 0) { 
          while ($row=mysqli_fetch_array($queryGetAddressID)) {
                  $_SESSION['addressID'] = $row['addressID'];
          }
                  

          
        }
      
  


  $queryAddCustomer = "INSERT INTO customer 
      (addressID , firstName, lastName, dob, gender, email , phone) 
      VALUES 
      ( {$_SESSION['addressID']}, '{$_SESSION['first_name']}' , '{$_SESSION['last_name']}', '{$_SESSION['dob']}' , '{$_SESSION['gender']}' , '{$_SESSION['email']}' , '{$_SESSION['phone']}' ) ";
      mysqli_query($connection, $queryAddCustomer);






  $queryGetCustomerID = mysqli_query($connection,"SELECT * FROM customer WHERE customerID=(SELECT max(customerID) FROM customer);");

  if (mysqli_num_rows($queryGetCustomerID) > 0) { 
          while ($row=mysqli_fetch_array($queryGetCustomerID)) {
                  $_SESSION['customerID'] = $row['customerID'];
          }
                  

          
        }
        
  


  $queryAddBill = "INSERT INTO bill 
      (customerID , branchID, billDate) 
      VALUES 
      ( {$_SESSION['customerID']} ,{$_SESSION['branch']} , '{$_SESSION['date']}' ) ";
      mysqli_query($connection, $queryAddBill);

  $queryGetBillID = mysqli_query($connection,"SELECT * FROM bill WHERE billID=(SELECT max(billID) FROM bill);");

  if (mysqli_num_rows($queryGetBillID) > 0) { 
          while ($row=mysqli_fetch_array($queryGetBillID)) {
                  $_SESSION['billID'] = $row['billID'];
          }
                  

          
        }


  $queryAddBillDetail = "INSERT INTO bill_detail
      (billID , productID, qty) 
      VALUES 
      ( {$_SESSION['billID']} , {$_SESSION['package']} , {$_SESSION['qty']} ) ";
      mysqli_query($connection, $queryAddBillDetail);





  

    header("Location: join_membership.php?bill");

}

  


if(isset($_POST['bill'])){
    header("Location: join_membership.php?success");

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


<body style="background-color: #fffdd0;padding-bottom: 50px">

    <div class="row" style="padding: 20px;  outline: solid black 1px !important">

      <div class="col-md-12">
        
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand " href="index.php" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">HOME</button>
          </a>
        </nav>
      </div>
      

    </div>  

    <div class="row" style="margin-top: 50px">
      <div class="col-md-12" style="text-align: center">
      <h1>MEMBERSHIP FORM</h1>

      </div>
    </div>
<?php if(isset($_GET["biodata"])) { ?>
    <div class="row" style="padding: 20px 400px">
      <div class="col-md-12" style="background-color: white;padding: 20px">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
          </div>
          <div class="form-group">
            <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
          </div>
          <div class="form-group"> <!-- Date input -->
                <input style="font-size: 14px" class="form-control" id="date" name="date" placeholder="Birthdate" type="text"/>
            </div>
              <script>
              $(document).ready(function(){
                var date_input=$('input[name="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                  format: 'yyyy-mm-dd',
                  container: container,
                  todayHighlight: true,
                  autoclose: true,
                };
                date_input.datepicker(options);
              })
          </script>
          <div class="form-group">
              <select name="gender" style="font-size: 14px" class="form-control" id="exampleFormControlSelect1">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
          </div>   
          <div class="form-group">
            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone">
          </div>
          <button type="submit" name="biodata" class="btn btn-ticket" style="width: 100%">NEXT</button>
        </form>
        
      </div>
    </div>
  <?php } ?>

  <?php if(isset($_GET["membership"])) { 
    $queryGetProducts = mysqli_query($connection,"SELECT * FROM product");
    $queryGetBranch = mysqli_query($connection,"SELECT * FROM branch");
    

         
          ?>

 
    <div class="row" style="padding: 20px 400px">
      <div class="col-md-12" style="background-color: white;padding: 20px">
        <form action="" method="post">
            <label for="" style="margin-left: 2px;font-size: 12px">Please Choose Your Package</label>
            <div class="form-group">
              <select name="package" style="font-size: 14px" class="form-control" id="exampleFormControlSelect1">
                <?php  if (mysqli_num_rows($queryGetProducts) > 0) { 
            while ($row=mysqli_fetch_array($queryGetProducts)) {
                  ?>
                  <option value="<?php echo $row["productID"] ?>"><?php echo $row["productName"] ?></option>
                            <?php }} ?>

                </select>
            </div>
            <div class="form-group">
              <input type="text" name="qty" class="form-control" id="exampleInputEmail1" placeholder="How Many Months">
            </div>
            <label for="" style="margin-left: 2px;font-size: 12px">Which Branch Is The Closest To Your Home ?</label>
            <div class="form-group">
              <select name="branch" style="font-size: 14px" class="form-control" id="exampleFormControlSelect1">
                <?php  if (mysqli_num_rows($queryGetBranch) > 0) { 
            while ($row=mysqli_fetch_array($queryGetBranch)) {
                  ?>
                  <option value="<?php echo $row["branchID"] ?>"><?php echo $row["branchName"] ?></option>
                                <?php }} ?>

                </select>
            </div>
            <hr style="background-color: black">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
              <input type="text" name="country" class="form-control" id="exampleInputEmail1" placeholder="Country">
            </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
              <input type="text" name="postalCode" class="form-control" id="exampleInputEmail1" placeholder="Postal Code">
            </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
              <input type="text" name="province" class="form-control" id="exampleInputEmail1" placeholder="Province">
            </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
              <input type="text" name="district" class="form-control" id="exampleInputEmail1" placeholder="District">
            </div>
              </div>
            </div>
            
            
           
            
            <div class="form-group">
              <input type="text" name="city" class="form-control" id="exampleInputEmail1" placeholder="City">
            </div>
            <div class="form-group">
                  <textarea name="address" style="font-size: 14px" placeholder="Address" name="address" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
          <button type="submit" name="membership" class="btn btn-ticket" style="width: 100%">CHECKOUT</button>
        </form>
        
      </div>
    </div>

  <?php } ?>

  <?php if(isset($_GET["bill"])) {
  $_SESSION['sub_total'] = 0;
 
    $queryGetBillDetail = mysqli_query($connection,"SELECT * FROM product, bill_detail, personal_trainer 
                                                              WHERE product.productID = bill_detail.productID AND personal_trainer.positionID  = product.productID AND bill_detail.billID = {$_SESSION['billID']}");
    ?>
    <div class="row" style="padding: 0px 390px;margin-top: 30px">
      <div class="col-md-6">
        <p>Bill ID : <?php echo $_SESSION['billID']; ?></p>
      </div>
      <div class="col-md-6" style="text-align: right">
        <p>Bill Date : <?php echo $_SESSION['date']; ?></p>

      </div>
    </div>
    <div class="row" style="padding: 0px 390px">
      <div class="col-md-6">
        <p><?php echo $_SESSION['gends']; ?> <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></p>
      </div>
      <div class="col-md-6" style="text-align: right">
        <p>Branch : <?php echo  $_SESSION['branchName']; ?></p>

      </div>
    </div>

          
    <div class="row" style="padding: 0px 400px">
      <div class="col-md-12" style="background-color: white;padding: 20px">
        <form action="" method="post">
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
                 <?php  if (mysqli_num_rows($queryGetBillDetail) > 0) { 
            while ($row=mysqli_fetch_array($queryGetBillDetail)) {
                  ?>
                <tr>
                  <td>1</td>
                  <td><?php echo $row["productName"] ;?></td>
                  <td><?php echo $row["qty"]; ?></td>
                  <td>Rp. <?php echo $row["price"] ;?> </td>
                  <td><?php echo $row["name"]; ?></td>

                 
                </tr>
              <?php  $_SESSION['sub_total'] += $row["qty"] * $row["price"] ;
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
            <label for="" style="margin-left: 2px;font-size: 12px">Address</label>
              </div>
            </div>
            <div class="row" style="margin-top: -10px">
              <div class="col-md-12">
                <p><?php echo  $_SESSION['address'] ?>, <?php echo  $_SESSION['branchName'] ?> ,<?php echo  $_SESSION['city'] ?>, <?php echo  $_SESSION['province'] ?>, <?php echo  $_SESSION['country'] ?></p>
              </div>
            </div>
          <button type="submit" name="bill" class="btn btn-ticket" style="width: 100%">DONE</button>
        </form>
        
      </div>
    </div>
  <?php } ?>

    <?php if(isset($_GET["success"])) { ?>
      <div class="row" style="padding: 0px 300px;text-align: center;margin-top: 100px">
        <div class="col-md-12">
          <h3>Thank you for joining with us!</h3>
        </div>
        <div class="col-md-12" style="padding: 0px 200px;margin-top: 30px">
          <a href="index.php">
         <button type="submit" name="bill" class="btn btn-ticket" style="width: 100%">BACK TO HOME</button>

        </a>
        </div>
        
      </div>


  <?php } ?>

</body>
</html>