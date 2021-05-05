

<?php
	session_start();
?>
<html>
	<head>
		<title>
			KYC 
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
<div id="header">
<label>Upload your files</label>
</div>
<div id="body">
 <form action="upload.php" method="post"style="padding-left:15px;" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload" >upload</button>
 </form>
 <label><a href="view.php">click here to view file.</a></label>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  </label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        
        <?php
 }
 ?>
</div>
</body>
</html>