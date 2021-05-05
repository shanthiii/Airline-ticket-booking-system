<?php
session_start();
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 require_once('Database Connection file/mysqli_connect.php');
 $customer_id=$_SESSION['login_user'];
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO myblob(type,size,file,det_customer_id) VALUES('$file_type','$new_size','$final_file','$customer_id')";
  $res=mysqli_query($dbc,$sql);
?>
  <script>
  alert('successfully uploaded');
        window.location.href='id.php?success';
        </script>
<?php
	 }
else
{
?>
<script>
  alert('error while uploading file');
        window.location.href='id.php?fail';
        </script>
<?php
}
 }
?>
