<?php
	session_start();
?>
<html>
	<head>
		<title>
			PNR ENQUIRY
		</title>
	</head>
	<body>
		<?php
			require_once('Database Connection file/mysqli_connect.php');
			$customer_id=$_SESSION['login_user'];
			//echo $customer_id;
			$query="SELECT * from customer WHERE customer_id='$customer_id'";
			$res=mysqli_query($dbc,$query);
			
			//echo $row;
			while($row =  mysqli_fetch_array($res)){
	
					echo "CUSTOMER ID: ".$customer_id;	
					echo "<br>";
					echo "NAME: ".$row['name'];
					echo "<br>";
					echo "EMAIL: ".$row['email'];
					echo "<br>";
					echo "MOBILE NO.: ".$row['phone_no'];
					echo "<br>";
					echo "ADDRESS: ".$row['address'];
					echo "<br>";
					}
		?>
	</body>
</html>