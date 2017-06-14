<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="stylesheet.css">
<script>
	//put javascript here
</script></head>
<body>
<div><img src="oasis.png" alt="Logo" style="width:70px; height:55px; margin-left:5px;"></div>
	
	<ul>
	<li><a href="admin_list.php">Admin List</a></li>
	<li><a href="employee_list.php">Employees List</a></li>
	</ul>
	<center><table id="table" style="color:black">
			
    </table></center>
<?php
include_once("users.php");
$obj=new users();
	$r=$obj->viewUser('admin');

echo"<center>
<table>
<tr>
<th>Admin</th>
<th>email</th>
<th>Remove</th>
</tr>
<center>";

while ($row=$obj->fetch()){
	$code=$row['ADMIN_ID'];
	echo"<center>
	<tr>
	<td>{$row['FIRSTNAME']}{$row['LASTNAME']}</td>
	<td>{$row['EMAIL']}</td>
	<td><a href='delete.php?ADMIN_ID=$code'><img src='dustbin.png' alt='delete' style='width:30px;height:30px;'></a></td>
	</tr><br></center>";

}
echo"<center></table></center>";
?><center><br>
<button type="submit" name="add" value="add" style="margin-left:200;">Add</button></center>
</body>
</html>