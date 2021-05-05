<?php
	session_start();
?>
<html>
	<head>
		<title>
			Ticket Booking Successful
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
    			margin: 0px 127px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/boardingcss.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<?php

		
				//$bar = ;
				//echo $arr[0];
				//echo $result[0]. "" .(string) $pnr;
				//echo strval($result[0])+$pnr;
		

		//echo $_SESSION['pass_namee'];
		//$query = "SELECT * FROM `passengers` WHERE pnr=6287209";
		
		?>
		<img class="logo" src="images/shutterstock_22.jpg"/> 
		<h1 id="title" class="title">
		Fly High
		</h1>
		<div class="line">
		<ul class="navi">
				<li class="linavi"><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li class="linavi"><a href="view_booked_tickets.php"><i class="fa fa-desktop" aria-hidden="true"></i> View Booked ticket</a></li>
				<li class="linavi"><a href="PNR_enquiry.php"><i class="fa fa-search" aria-hidden="true"></i> PNR enquiry</a></li>
				<li class="linavi"><a href="cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Booked tickets</a></li>
				<li class="linavi"><a href="DUM.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Profile Management</a></li>
				<li class="linavi"><a href="id.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> KYC </a></li>
				<li class="linavi"><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>BOOKING SUCCESSFUL</h2>
		<h3>Your payment of &#x20b9; <?php echo $_SESSION['total_amount']; ?> has been received.<br><br> Your PNR is <strong>
		<?php $pnr=$_SESSION['pnr'];echo $pnr;?>
		</strong>. Your tickets have been booked successfully.</h3>
		<?php 
		require_once('Database Connection file/mysqli_connect.php');
		$query="SELECT name, age, gender, from_city, to_city, departure_date, departure_time, arrival_time, class, flight_no FROM flight_details INNER JOIN ticket_details USING (flight_no) INNER JOIN passengers USING (pnr) WHERE pnr=$pnr";
				$res=mysqli_query($dbc,$query);
				echo "<table cellpadding=\"10\"";
				echo "<tr>
					<td><strong>NAME</strong></td>
					<td><strong>AGE</strong></td>
					<td><strong>GENDER</strong></td>
					<td><strong>FROM</strong></td>
					<td><strong>TO</strong></td>
					<td><strong>DEP_DATE</strong></td>
					<td><strong>DEP_TIME</strong></td>
					<td><strong>ARR_TIME</strong></td>
					<td><strong>CLASS</strong></td>
					<td><strong>FLIGHT NUM</strong></td>
					</tr>";
					echo "<br>";
				while($row = mysqli_fetch_assoc($res)){
					echo "<tr>
					<td>".$row['name']."</td>
					<td>".$row['age']."</td>
					<td>".$row['gender']."</td>
					<td>".$row['from_city']."</td>
					<td>".$row['to_city']."</td>
					<td>".$row['departure_date']."</td>
					<td>".$row['departure_time']."</td>
					<td>".$row['arrival_time']."</td>
					<td>".$row['class']."</td>
					<td>".$row['flight_no']."</td>
					</tr>";
					echo "<br>";
					
					
				}
				
				echo "<tr><form action=\"view_ticket.php\">
					<button type=\"submit\" class=\"submit\">View Tickets</button>
				</form></tr>";
				?>
				
	</body>
	
</html>

