<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet"  type="text/css" href="stylesheet.css">
<script src="js/jquery-1.12.1.js"></script>
<script>
var currentObject=null;

	function searchInfo(xhr,status){
				if(status!="success"){
					 document.getElementById('table').innerHTML ="error sending request";
					return;
				}
				
				var obj=$.parseJSON(xhr.responseText);
				if (obj.result==0){
				document.getElementById('table').innerHTML ="Search request for Employee failed";	
				return;
				}
 
					$(function(){
	document.getElementById('table').innerHTML =" <thead><tr><th>PERSONAL_ID</th><th>TITLE</th><th>FIRSTNAME</th><th>LASTNAME</th><th>GENDER</th><th>EMAIL</th><th>HOME_NUMBER</th><th>CELLPHONE</th></tr> </thead>";
    $.each(obj, function(i, item){
        var tr = $('<tr>').append(
			$('<td>').text(item.PERSONAL_ID),
			$('<td>').text(item.TITLE),
			$('<td>').text(item.FIRSTNAME),
			$('<td>').text(item.LASTNAME),
            $('<td>').text(item.GENDER),
            $('<td>').text(item.EMAIL),
			$('<td>').text(item.HOME_NUMBER),
			$('<td>').text(item.CELL_PHONE)
        ).appendTo('#table');
     });
  });
}

	function search(){
		var input =$("#search").val();
		var theUrl="search.php?search="+input;
					$.ajax(theUrl,
						{
						async:true,
						complete:searchInfo
						}
						);
	}
</script>
</head>
<body>
<div><img src="oasis.png" alt="Logo" style="width:70px; height:55px; margin-left:5px;"></div>
	<div><input type="text" id="search" name="search" style="float: right"/>
	<span style="text-align:center;float: right"><input type="button" value="Search" onclick="search()"></span></div>
	<ul>
	<li><a href="admin_list.php">Admin List</a></li>
	<li><a href="employee_list.php">Employees List</a></li>
	</ul>
	<center><table id="table" style="color:black">
			
    </table></center>
<?php
include_once("users.php");
$obj=new users();
	$r=$obj->viewUser('employee');

echo"<center>
<table>
<tr>
<th>employees</th>
<th>email</th>
<th>phone</th>
<th>Remove</th>
</tr>
<center>";

while ($row=$obj->fetch()){
	$code=$row['PERSONAL_ID'];
	echo"<center>
	<tr>
	<td>{$row['FIRSTNAME']}{$row['LASTNAME']}</td>
	<td>{$row['EMAIL']}</td><td>{$row['CELL_PHONE']}</td>
	<td><a href='delete.php?PERSONAL_ID=$code'><img src='dustbin.png' alt='delete' style='width:30px;height:30px;'></a></td>
	</tr><br></center>";
}

echo"<center></table></center>";
?><center><br>

<button type="submit" style="margin-left:200;">Add</button></center>
</body>
</html>
