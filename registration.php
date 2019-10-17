<?php
include("dbConnection.php");

//print_r($_POST);
$msg="";
if(isset($_POST['Singup'])){
	
$sql="insert into user (fname,lname,email,pwd,gender) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['gender']."')";	
	
if($conn->query($sql)){
$msg="Data Insert successfuly";	

$to =$_POST['email'];
$subject = "Test Mail";
$headers = "From: techvisionitfacebook@gmail.com\r\n";
$message ="hello";

    if(mail($to,$subject,$message,$headers))
    {
        $msg="Mail Send Sucuceed";
    }
    else{
        $msg="Mail Send Failed";    
    }

}
}
else{
$msg="Please Fill the form";	
	
}
?>

<html>
<head>


</head>
<body>
<h1> User Registration </h1>
<h1 style="color:red;"> <?php  echo $msg; ?> </h1>
<form method="POST">
<p><input type="text" name="fname" placeholder="first name" /></p>
<p><input type="text" name="lname" placeholder="Last name" /></p>
<p><input type="text" name="email" placeholder="Email"/></p>
<p><input type="text" name="password" placeholder="password"/></p>
<p><input type="radio" value="m" name="gender" />Male</p>
<p><input type="radio" value="f" name="gender" />Female</p>
<p><input type="submit" name="Singup" value="Sing up" /></p>

</form>

</body>

</html>