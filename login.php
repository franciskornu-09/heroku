<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="stylesheet.css">
<script>
	//put javascript here
</script></head>

<body>
<center>
<div><img src="oasis.png" alt= "Oasis WebSoft" style="width:150px;height:135px; margin-left: 65px; "></div><br>
<form action="" method="POST">
<div>
<input type="text" class="txtbox" name="USERNAME" placeholder="USERNAME"/>
</div><br>
<div>
<input type="password" class="txtbox" name="PASSWORD" placeholder="PASSWORD"/></div><br>
<button type="submit" name="submit" value="submit">submit</button>
</center></form>

<?php
include("users.php");
$obj=new users();

if(isset($_REQUEST['USERNAME'])){
$name=$_REQUEST['USERNAME'];
$pword=$_REQUEST['PASSWORD'];

if(isset($_REQUEST['submit'])){
	$result=$obj->getUser($name, $pword);
	if($result==true){
		header("Location:employee_list.php");
	}
	else{
		echo"Your username or password is wrong";
	}
}
}
?>

</body>
</html>



