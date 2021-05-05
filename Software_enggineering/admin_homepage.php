<?php
	session_start();
?>
<html>
	<head>
		<title>
			Welcome Administrator
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
    			margin: 0% 15.8%
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
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
				<li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="admin_view_booked_tickets.php"><i class="fa fa-desktop" aria-hidden="true"></i> View planes</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>Boarding Pass Verification</h2>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table cellspacing="10">
				<tr>
					<td>PNR number:</td>
					<td>
						<input type="number" name="pnr" required>
					</td>	
				</tr>
				<tr>
					<td>Passenger Name:</td>
					<td>
						<input type="text" name="pass_name" required>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="Submit" name="submit"></button>
					</td>
				</tr>
			</table>
		</form>
		<?php
			if(isset($_POST['submit'])) 
			{ 
				$g = $_POST['pass_name'];
				$j = $_POST['pnr'];
				require_once('Database Connection file/mysqli_connect.php');
				$que1 ="SELECT name, pnr from status where pnr='$j' and name = '$g'";
				$res1=mysqli_query($dbc,$que1);
				if($row = mysqli_fetch_assoc($res1)){
					echo $row['name'];
					echo $row['pnr'];
					echo "<h2 style=\"color: green\";>Boarding pass verified! Updated successfully!!</h2>";
					//QUERY

					
					$yes = "verified";
					// $query = 'UPDATE `status` set `verify_status` = "hellooo" WHERE `name` = \'$g\' AND pnr = "$j"';
					// $set = mysqli_query($dbc, $query);
					$sql = "UPDATE `status` SET `verify_status`= '$yes' WHERE name='$g' AND pnr='$j'";
					mysqli_query($dbc, $sql);
					// $stmt = mysqli_prepare($dbc,$query);
					// mysqli_stmt_execute($stmt);
					// $affected_rows=mysqli_stmt_affected_rows($stmt);
					// echo 'Status added '.$affected_rows.'<br>';

				}
				else {
						echo "<h2 style=\"color: red\";>Boarding pass rejected! Unidentified Passenger!!</h2>";
					}
			}
		?>
			

	</body>
</html>