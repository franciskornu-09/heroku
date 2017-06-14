<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body id="imgBody">
	
	<form action="" method="POST">
		<div style="text-align:center" id="box">
		<h2 style="text-align:center"> Employee Information</h2>
		Employee First Name: <input type="text" name="fname"></br></br>
		Employee Last Name: <input type="text" name="lname"></br></br>
		Employee Middle Name: <input type="text" name="mname"></br></br>
		Employee Email: <input type="email" name="mail"></br></br>
		<div style="text-align:center"><input type="submit" value="SUBMIT" id="submit"></div></br>
		</div>
	</form>
</body>
</html>
<?php
include_once("users.php");
$obj = new users();
$user="employee";

if (isset($_REQUEST['fname'])){

$result=$obj->addUser($_REQUEST['fname'],$_REQUEST['lname'], $_REQUEST['mname'], $_REQUEST['mail'],$user);
$to=$_REQUEST['mail'];
$subject="Employee Form";
$text="http://localhost:8888/Test/Main/form.php";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

	if (!$result){
		echo "Error occurred when adding new employee";
	}else{
		echo "successful";
		mail($to,$subject,$text,$headers);
	}
}
?>
 
 
 