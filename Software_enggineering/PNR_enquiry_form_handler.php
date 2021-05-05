<?php
	session_start();
?>
<html>
<head>
		<title>
		     PNR enquiry
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 68px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="images/shutterstock_22.jpg"/> 
		<h1 id="title">
		Fly High
		</h1>
		<div>
		<ul>
				<li><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="view_booked_tickets.php"><i class="fa fa-desktop" aria-hidden="true"></i> View Booked ticket</a></li>
				<li><a href="PNR_enquiry.php"><i class="fa fa-search" aria-hidden="true"></i> PNR enquiry</a></li>
				<li><a href="cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Booked tickets</a></li>
				<li><a href="DUM.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Profile Management</a></li>
				<li><a href="id.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> KYC </a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<br>	
		<div style="padding-left:30px">
		<?php
			if(isset($_POST['Enquiry']))
			{
				$data_missing=array();
				if(empty($_POST['pnr']))
				{
					$data_missing[]='PNR';
				}
				else
				{
					$pnr=trim($_POST['pnr']);
				}

				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');

					$todays_date=date('Y-m-d'); 
					$customer_id=$_SESSION['login_user'];

					$query="SELECT * from Ticket_Details WHERE pnr=$pnr";
					$res=mysqli_query($dbc,$query);

					while($row = mysqli_fetch_assoc($res)){
	
					echo "Date of reservation: ".$row['date_of_reservation'];	
					echo "<br>";
					echo "Fight_no.:".$row['flight_no'];
					echo "<br>";
					echo "Journey Date:".$row['journey_date'];
					echo "<br>";
					echo "Class:".$row['class'];
					echo "<br>";
					echo "Booking status".$row['booking_status'];
					echo "<br>";
					echo "No of passengers".$row['no_of_passengers'];
					echo "<br>";
					echo "Payment_id:".$row['payment_id'];
					echo "<br>";
					echo "Customer_id:".$row['customer_id'];
					echo "<br>";
					echo "Insurance:".$row['insurance'];
					echo "<br>";
					echo "Priority checkin:".$row['priority_checkin'];
					echo "<br>";
					echo "Lounge_access:".$row['lounge_access'];
					echo "<br>";
					}
				}
			}
		?>
		</div>
	</body>
</html>