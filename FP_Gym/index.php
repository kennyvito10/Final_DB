<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WAK Gym</title>
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
          <a class="navbar-brand " href="#contact-us" style="color: white !important;font-size: 15px;">
            <button class="btn-ticket" style="width: 130px;height: 40px;border-radius: 5px">CONTACT US</button>
          </a>
          <a class="navbar-brand " href="#package" style="color: white !important;font-size: 15px;margin-left: 40px">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">PACKAGE</button>
          </a>
          <a class="navbar-brand " href="#member" style="color: white !important;font-size: 15px;margin-left: 40px">
            <button class="btn-ticket" style="width: 100px;height: 40px;border-radius: 5px">MEMBER</button>
          </a>
          <a class="navbar-brand " href="admin.php" style="color: white !important;font-size: 15px;margin-left: 50px;">ADMIN</a>
        </nav>
      </div>

    </div>  
      <img style="width: 100%;opacity: 0.8" src="home_gif.gif" alt="">
      <div class="overlay-desc">
        <h1 style="color: white">GYM MEMBERSHIP</h1>
      </div>
      <div class="overlay-desc" style="margin-top: 130px">
      <a href="join_membership.php?biodata">
        <button class="btn-ticket" style="border-radius: 5px;width: 450px;height: 70px;font-size: 20px">JOIN THE GYM</button>
      </a> 
      </div>
     
  </div>  
  <div id="package">
    
  </div>

  <div class="row" style="text-align: center;margin-top: 150px" >
    <div class="col-md-12">
      <p style="font-size: 50px;color: white" >OUR PACKAGE</p>
    </div>
  </div>
  <div class="row"  style="padding: 70px 200px;">
    <div class="col-md-3" style="width: 100%">
      <div class="card" style="border: 1px solid white">
        <img src="assets/weight_lifting.jpg" class="card-img-top" alt="..." style="height: 200px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">WEIGHT LIFTING</p>
        <p style="font-size: 12px" class="card-text">Get your gains today with our professional team of bodybuilders to train you how to get the most out of your weight lifting routines.</p>

        </div>
      </div>
    </div>
    <div class="col-md-3" style="width: 100%">
      <div class="card" style="border: 1px solid white">
        <img src="assets/yoga.jpg"  class="card-img-top" alt="..." style="height: 200px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">YOGA CLASS</p>
        <p style="font-size: 12px" class="card-text">Yoga is the perfect way to train the body and the mind. Our gurus will take you on a refreshing mental and physical journey to strengthen your core and be more mindful.</p>

        </div>
      </div>
    </div>
    <div class="col-md-3" style="width: 100%">
      <div class="card" style="border: 1px solid white">
        <img src="assets/zumba.jpg" class="card-img-top" alt="..." style="height: 200px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">ZUMBA CLASS</p>
        <p style="font-size: 12px" class="card-text">Dance your stress away in our Zumba class. Zumba is our recommended class for our members seeking to burn those calories fast! Our team of Zumba coaches know how to keep your heartrate and hype constantly high.</p>

        </div>
      </div>
    </div>
    <div class="col-md-3" style="width: 100%">
      <div class="card" style="border: 1px solid white">
        <img src="assets/calisthenics.jpg" class="card-img-top" alt="..." style="height: 200px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">CALISTHENICS</p>
        <p style="font-size: 12px" class="card-text">Our Calisthenics program is aimed at making our members strong and agile while keeping a lean physique. While our weight lifting program will make you strong and bulky, we make sure that you retain your full range of movement as we sculpt your body as fit as we can.</p>

        </div>
      </div>
    </div>

  </div>

  


  <div class="row" style="text-align: center;margin-top: 150px" id="member">
    <div class="col-md-12">
      <p style="font-size: 50px;color: white" >MEET THE GROUP MEMBER</p>
    </div>
  </div>
  <div class="row"  style="padding: 70px 200px;">



     <div class="col-md-4" style="width: 100%">
      <div class="card" style="border: 1px solid white">
        <img src="assets/alessandro.jpg" class="card-img-top" alt="..." style="height: 420px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">ALESSANDRO</p>
        <p style="font-size: 12px" class="card-text">Alessandro Christopher Leonardo</p>

        </div>
      </div>
    </div>
    <div class="col-md-4" style="width: 100%">
      <div class="card" style="border: 1px solid white;">
        <img src="assets/kenny.jpg" class="card-img-top" alt="..." style="height: 420px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">KENNY</p>
        <p style="font-size: 12px" class="card-text">Klementinus Kennyvito Salim</p>

        </div>
      </div>
    </div>
    <div class="col-md-4" style="width: 100%">
      <div class="card" style="border: 1px solid white;">
        <img src="assets/wely.jpg" class="card-img-top" alt="..." style="height: 420px">
        <div class="card-body" style="background-color: black !important;color: white;text-align: center;font-size: 25px">
          <p class="card-text">WELY</p>
        <p style="font-size: 12px" class="card-text">Wely Dharma Putra</p>

        </div>
      </div>
    </div>

  </div>

        <footer class="page-footer font-small blue pt-4 " style="padding: 0px 200px;background-color: #effd5f" id="contact-us">

          <!-- Footer Links -->
          <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">Contact Us</h5>
                <p>WHATSAPP : +628 1885 4679</p>

              </div>
              <!-- Grid column -->

              <hr class="clearfix w-100 d-md-none pb-3">

             

              <!-- Grid column -->
              <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Social Media</h5>

                <ul class="list-unstyled">
                  <li>
                    <a href="#!">Instagram</a>
                  </li>
                  <li>
                    <a href="#!">Facebook</a>
                  </li>
                  <li>
                    <a href="#!">Youtube</a>
                  </li>
                 
                </ul>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Footer Links -->

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2020 Copyright
            
          </div>
          <!-- Copyright -->

        </footer>
</body>
</html>
