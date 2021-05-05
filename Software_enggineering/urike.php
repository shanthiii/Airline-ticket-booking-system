<?php
	session_start();
?>
<html>
	<head>
		<title>
			Enter Travel/Ticket Details
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=number] {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 0px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 500px
			}
			input[type=radio] {
    			margin-right: 30px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 15px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/ticketcss.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
    <img class="logo" src="images/shutterstock_22.jpg"/> 
		<h1 class="title">
		Fly High
		</h1>
		<div>
		    <ul class="nav">
				<li class="nav"><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li class="nav"><a href="view_booked_tickets.php"><i class="fa fa-desktop" aria-hidden="true"></i> View Booked ticket</a></li>
				<li class="nav"><a href="PNR_enquiry.php"><i class="fa fa-search" aria-hidden="true"></i> PNR enquiry</a></li>
				<li class="nav"><a href="cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Booked tickets</a></li>
				<li class="nav"><a href="DUM.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Profile Management</a></li>
				<li class="nav"><a href="id.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> KYC </a></li>
				<li class="nav"><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
        <div class="container">
            <?php 
            $no_of_pass=$_SESSION['no_of_pass'];
            $count=$_SESSION['count'];
        while($count<=$no_of_pass){
          echo " <div class=\"sub-container\">
          <div class=\"boarding-pass\">
          <div class=\"boarding-pass__top\">
              <div class=\"top__img\">
                      <h1>Fly high</h1>
                      
                  </div>
              <div class=\"top__text\">
                  <div class=\"text__left\">
                      <h1>HYD</h1>
                      <span>Hyderabad</span>
                  </div>
                  <div>
                      <img src=\"http://svgshare.com/i/2aW.svg\" width=\"50px\" height=\"35\" alt=\"plane\">
                  </div>
                  <div class=\"text__right\">
                      <h1>BLR</h1>
                      <span>Bengaluru</span>
                  </div>
              </div>
          </div>
          <div class=\"boarding-pass__details\">
              <ul class=\"tic\">
                  <li>
                      <span>Flight</span>
                      <h4>AA101</h4>
                  </li>
                  <li>
                      <span>Departure</span>
                      <h4>25 Dec 15</h4>
                  </li>
                  <li>
                      <span>Boarding time</span>
                      <h4>15:48 am</h4>
                  </li>
              </ul>
              <ul class=\"tic\">
                  <li>
                      <span>Seat no</span>
                      <h4>S1</h4>
                  </li>
                  <li>
                      <span>Gate</span>
                      <h4>L5</h4>
                  </li>
                  <li>
                      <span>Type</span>
                      <h4>economy</h4>
                  </li>
              </ul>
              <ul class=\"tic\">
              <div class=\"barcode\">
                         
              <span>Barcode</span> 
              </div>
          </ul>
          </div>
      </div></div>";
      $count=$count+1;
        }
        ?>
       
        </div>
	</body>
</html>