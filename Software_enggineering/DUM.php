<?php
	session_start();
?>

<style>
    .row{
        padding-left:100px;
    }
    .col-md-4 {
        column-fill:auto;
    }
    .btn {
        display: block;
        padding: 5px;
    }
</style>

<html>
<head>
    <style>
        body{
            background-color: white;
            color: white;

        }
        .update {
            height: 30px;
            width: 219px;
            color: black;
            border: round;
        }
        input {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
        }
        input[type=submit] {
            background-color: #FFFFFF;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 0px 135px
        }
    </style>
    <link rel="stylesheet"  href="css/style.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
    <title>Profile</title>
</head>
<body style="background-color: white; color: black;">
    <img class="logo" src="images/shutterstock_22.jpg"/> 
    <h1 id="title" style="background-color: white">
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
    <div class="layout">
        <div class="row-1">
            <div class ="column-1">
                <form class="center_form" action="DUM_handler.php" method="POST" id="new_user_from">
                    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Update Here</h2>
                    <strong>Select field to update details here</strong>    
                    <select type="text" name="update" class="update" value="Select---">
                        <option name= "name" value="name">Name</option>
                        <option name="phone" value="phone num">Phone no.</option>
                        <option name="email" value="email">Email address</option>
                        <option name="address" value="address">Address</option>
                    </select>
                    <br><br>

                    <input type="text" name="value" id="add" placeholder="value to update" required><br><br>
                    <button class="btn" type="submit">Update</button>
                </form>
                <form class="pass" action="pass_page.php" method="POST">
                    <p>Old password</p>
                    <input type="password" name="value_1" id="add">
                    <p>New password</p>
                    <input type="password" name="value_2" id="add"><br><br>
                    <button class="btn" type="submit">Update</button>
                </form>
            </div>
            <div class ="column-2">
               <div class="details">
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
            </div></div>
            </div>
    </div>
</body>
</html>