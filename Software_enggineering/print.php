<?php
	session_start();
?>
<html>
	<head>
		<title>
			Ticket
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
        <div class="container">
		<?php 
			include('random.php');
			//include('business_seat_no.php');
			include 'barcode128.php';
			$pnr = $_SESSION['pnr'];
			require_once('Database Connection file/mysqli_connect.php');
			$query1="SELECT name FROM flight_details INNER JOIN ticket_details USING (flight_no) INNER JOIN passengers USING (pnr) WHERE pnr=$pnr";
				
				$ress = mysqli_query($dbc,$query1);
				$h = array();
				$result = array();
				while(($qrep=mysqli_fetch_assoc($ress))) {
					$result[ ] =implode(" ",$qrep);
					$arr = $qrep['name']. "" .(string) $pnr;
					$h[] =  bar128($arr);
				}
				$que1 ="SELECT city_code FROM flight_details INNER join city on (flight_details.from_city = city.city_name) INNER JOIN ticket_details using (flight_no) WHERE pnr = $pnr";
				$res1=mysqli_query($dbc,$que1);
				while($row = mysqli_fetch_assoc($res1)){
					$a = $row['city_code'];
				}
				$que1 ="SELECT city_code FROM flight_details INNER join city on (flight_details.to_city = city.city_name) INNER JOIN ticket_details using (flight_no) WHERE pnr = $pnr";
				$res1=mysqli_query($dbc,$que1);
				while($row = mysqli_fetch_assoc($res1)){
					$d = $row['city_code'];
				}
				
				$query="SELECT name, gate_no,age, gender, from_city, to_city, departure_date, departure_time, arrival_time, class, flight_no FROM flight_details INNER JOIN ticket_details USING (flight_no) INNER JOIN passengers USING (pnr) WHERE pnr=$pnr";
						$res=mysqli_query($dbc,$query);
						if($row = mysqli_fetch_assoc($res)){
							$b = $row['from_city'];
							$c = $row['to_city'];
							$dep_d =  $row['departure_date'];
							$dep_t =  $row['departure_time'];
							$fli_no = $row['flight_no'];
							$gate = $row['gate_no'];
													$class = $row['class'];
						}
		
				$no_of_pass=$_SESSION['no_of_pass'];
				$count=$_SESSION['count'];
				$row_count =$no_of_pass/3;
				$s_count =0;     
                echo "<table>";
				
				

                for($y=0;$y<=$row_count;$y++){
                  echo "<tr>";
                  if($count>$no_of_pass){
                    break;
                   }
                  for ($x = 0; $x <3; $x++) {
                    if($count>$no_of_pass){
                        break;
                       }


					if($class == "economy") {
						$seat =  econ();
						//echo $seat;
					}
					else{
						$seat = busin();
					}
	
					//    $pra = econ();
					//    echo $pra;
					//echo $count;   
				    $i = $count - 1;
                    echo " <td><div class=\"sub-container\">
                    <div class=\"boarding-pass\">
                    <div class=\"boarding-pass__top\">
                        <div class=\"top__img\">
                                <h1>Fly High</h1>
                            
                            </div>
                        <div class=\"top__text\">
                            <div class=\"text__left\">
                                <h1>
					   		$a
							</h1>
                                <span>$b</span>
                            </div>
                            <div>
                                <img src=\"http://svgshare.com/i/2aW.svg\" width=\"50px\" height=\"35\" alt=\"plane\">
                            </div>
                            <div class=\"text__right\">
                                <h1>$d</h1>
                                <span>$c</span>
                            </div>
                        </div>
                    </div>
                    <div class=\"boarding-pass__details\">
                        <ul class=\"tic\">
                            <li>
					   			
                                <span>Passenger Name</span>
                                <h4>$result[$i]</h4>
                            </li>
                            <li>
                                
								<span>Gate</span>
                                <h4>$gate</h4>
                            </li>
                            <li>
                                <span>Departure Time</span>
                                <h4>$dep_t</h4>
                            </li>
                        </ul>
                        <ul class=\"tic\">
                            <li>
                                <span>Seat no</span>
                                <h4>$seat</h4>
                            </li>
                            <li>
							<span>Departure Date</span>
							<h4>$dep_d</h4>
                            </li>
                            <li>
                                <span>Flight no.</span>
                                <h4>$fli_no</h4>
                            </li>
                        </ul>
                        <ul class=\"tic\">
                        <div class=\"barcode\">
                                   
                        <span>Barcode</span> 
						<h1 style=\"padding-top: 15px; width: 150px; height: 20px;\"; >$h[$i]</h1>
                        </div>
                    </ul>
                    </div>
                </div></div> </td>";
                $count=$count+1;
                  }
                  echo "</tr>";
                }
				
        ?>
        </div>
	</body>
</html>