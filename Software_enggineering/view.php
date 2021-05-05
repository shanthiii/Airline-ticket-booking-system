<?php
	session_start();
?>
<html>
	<head>
		<title>
			View KYC 
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
            .id{
                text-align:center;
                font-size:36px;
            }
            a.id:link {color:#ff0000;text-decoration:none;}
            a.id:visited {color:#0000ff;text-decoration:none;}
            a.id:hover {text-decoration:underline;}
		</style>
		<link rel="stylesheet" href="css/blobcss.css"/>
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
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...</th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
  require_once('Database Connection file/mysqli_connect.php');
$customer_id=$_SESSION['login_user'];
 $sql="SELECT * FROM myblob where det_customer_id='$customer_id'";
 $result_set=mysqli_query($dbc,$sql);

 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr>
	<td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
	<td><?php echo $row['file'] ?></td>
	<td><?php echo $row['det_customer_id'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    <br>
    <div class="id"><a class="id" href="id.php">upload new files...</a></div>
    
</div>
</body>
</html>