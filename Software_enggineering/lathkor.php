<?php 
session_start();
$g = $_POST['pass_name'];
echo $g;
$j = $_POST['pnr'];
echo $j;
//require_once('Database Connection file/mysqli_connect.php');
// $query = "SELECT name, pnr from passengers  where pnr=$j and name = $g";
// $res=mysqli_query($dbc,$query);
// echo $res;
// echo "hi";
// while($row = mysqli_fetch_assoc($res)){
     
// 	echo $row['pnr'];
// 	echo $row['name'];

// }
// echo "hello";

//  $pnr = $_SESSION['pnr'];
// $que1 ="SELECT name FROM flight_details INNER JOIN ticket_details USING (flight_no) INNER JOIN passengers USING (pnr) WHERE pnr=$pnr";
				
// 	$res1=mysqli_query($dbc,$que1);
// 	while($row = mysqli_fetch_assoc($res1)){
// 		//$a = $row['city_code'];
//         echo "hi";
//     }

require_once('Database Connection file/mysqli_connect.php');
							//$pnr=$_SESSION['pnr'];
							$que1 ="SELECT name, pnr from passengers where pnr='$j' and name = '$g'";
							$res1=mysqli_query($dbc,$que1);
                            //echo $res1;
							if($row = mysqli_fetch_assoc($res1)){
								echo $row['name'];
                                echo $row['pnr'];
							}
                            else {
                                echo "hi";
                            }


?>
