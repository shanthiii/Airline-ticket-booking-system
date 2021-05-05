<?php 
    session_start();
    //$var = $_POST['pass'];
    //echo $var;
    $pass = $_POST['value_1'];
    $pass_2 = $_POST['value_2'];
    require_once('Database Connection file/mysqli_connect.php');
    $customer_id=$_SESSION['login_user'];
    $pass_1 = $_SESSION['login_pass'];
    if($pass==$pass_1){
        $query="UPDATE customer SET pwd = '$pass_2' WHERE customer_id='$customer_id'";
        $res=mysqli_query($dbc,$query);
        echo "updated succesfully";
        header("location: logout_handler.php");
    }
    else {
        echo "Password Incorrect";
    }
?>

