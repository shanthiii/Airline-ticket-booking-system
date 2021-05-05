<?php
	session_start();
?>
<html>
	<head>
		<title>
			Profile 
		</title>
	</head>
	<body>
		<?php

			// $variable = $_POST['username'];
			// echo $variable;
			// echo "<br>";
			 $var = $_POST['value'];
			 echo "<br>";

			

			require_once('Database Connection file/mysqli_connect.php');

			$varo = $_POST['update'];

			$customer_id=$_SESSION['login_user'];

			switch($varo){
				case 'name': $query="UPDATE customer SET name = '$var' WHERE customer_id='$customer_id'";
						$res=mysqli_query($dbc,$query);
						break;
				case 'phone': $query="UPDATE customer SET phone_no = '$var' WHERE customer_id='$customer_id'";
						$res=mysqli_query($dbc,$query);
						break;
				case 'email': 
						$query="UPDATE customer SET email = '$var' WHERE customer_id='$customer_id'";
						$res=mysqli_query($dbc,$query);
						break;
				//case 4: $query="UPDATE customer SET pwd = '$var' WHERE customer_id='$customer_id'";
						//$res=mysqli_query($dbc,$query);
						//break;
				case 'dob': $query="UPDATE customer SET dob = '$var' WHERE customer_id='$customer_id'";
						$res=mysqli_query($dbc,$query);
						break;
				case 'aadhar': $query="UPDATE customer SET aadhar = '$var' WHERE customer_id='$customer_id'";
						$res=mysqli_query($dbc,$query);
						break;
				case 'address': $query="UPDATE customer SET address = '$var' WHERE customer_id='$customer_id'";
						$res=mysqli_query($dbc,$query);
						break;
			}

			

			//echo $customer_id;
			$query="SELECT * from customer WHERE customer_id='$customer_id'";
			$res=mysqli_query($dbc,$query);
			header("location: Dum.php");



			//echo $row;
		?>
	</body>
</html>