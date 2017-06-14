<?php

			$personal_Id="";
			$personal_fname="";
			$personal_lname="";
			$personal_mname="";
   if (!isset($_REQUEST['fname'])){
   include_once("users.php");
   $ob=new users();
   
   $result=$ob->searchUser(4);
   if (!$result){
	   echo "Employee failed";
   }else{
	   while($result=$ob->fetch()){
	   $personal_Id=$result['PERSONAL_ID'];
	   echo $personal_fname;
	   $personal_fname=$result['FIRSTNAME'];
	   $personal_lname=$result['LASTNAME'];
	   $personal_mname=$result['MIDDLENAME'];
	   }
   }
   }
?>
<html>
<head>
<title> Employment Form</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body id="imgBody">
	
	<form action="" method="POST">
			<div style="text-align:left" id="box">
			<h2 style="text-align:center"><u>Personal Information</u></h2>
			TITLE: <select name="title">
			<option value="Mr">Mr</option>
			<option value="Ms">Ms</option>
			<option value="Mrs">Mrs</option>
			<option value="Other">Other</option></br>
			</select>
			Other: <input type="text" name="text">
			</br></br>
			
			First Name: <input type="text" name="fname" value=<?php echo $personal_fname?>>
			Last Name: <input type="text" name="lname" value=<?php echo $personal_lname?>> 
			Middle Name: <input type="text" name="mname" value=<?php echo $personal_mname?>>
			
			Gender: <select name="gender">
			<option value="Male">M</option>
			<option value="Female">F</option>
			</select></br></br>
			
			Street Address: <input type="text" name="streetName">
			House Number: <input type="text" name="houseNumber">
			City: <input type="text" name="city"></br></br>
			Province: <input type="text" name="province">
			Postal Code: <input type="text" name="postalCode">
			Home Phone: <input type="text" name="homePhone"></br></br>
			Cell Phone: <input type="text" name="cellPhone">
			Email: <input type="email" name="email">
			Birth Date: <input type="date" name="birthDate"></br></br>
			Marital Status: <select name="status">
			<option value="single">Single</option>
			<option value="Married">Married</option>
			</select>
			Spouse's Firstname: <input type="text" name="sFName">
			Spouse's Lastname: <input type="text" name="sLName"></br></br>
			Spouse's Employer: <input type="text" name="spouseEmployer">
			Spouse's Phone: <input type="text" name="spousePhone"></br>
			
			<h2 style="text-align:center"><u> Job Information</u></h2>
			Title: <input type="text" name="jobTitle">
			Employee ID: <input type="text" name="employeeId" value=<?php echo $personal_Id?>>
			Supervisor: <input type="text" name="supervisor"></br></br>
			Job Description: <textarea name="jobDescription"></textarea>
			Office Email: <input type="email" name="officeEmail">
			Primary Phone: <input type="text" name="primaryPhone"></br></br>
			Alternative Phone: <input type="text" name="altPhone">
			Type of Employment: <select name="typeEmployment">
			<option value="Internship">Internship</option>
			<option value="Part-Time">Part-Time</option>
			<option value="Full-Time">Full-Time</option>
			<option value="Contract">Contract</option>
			</select></br></br>
			Employment Period:</br>
			Start: <input type="date" name="start">
			Finish: <input type="date" name="finish"></br>
			
			<h2 style="text-align:center"> <u>Emergency Contact Information</u></h2>
			First Name: <input type="text" name="Efname">
			Last Name: <input type="text" name="Elname">
			Middle Name: <input type="text" name="Emname"></br></br>
			Street Address: <input type="text" name="EstreetName">
			House Number: <input type="text" name="EhouseNumber">
			City: <input type="text" name="Ecity"></br></br>
			Province: <input type="text" name="Eprovince">
			Postal Code: <input type="text" name="EpostalCode">
			Home Phone: <input type="text" name="EhomePhone"></br></br>
			Cell Phone: <input type="text" name="EcellPhone">
			Relationship: <input type="text" name="relationship"></br></br>
			<div style="text-align:center"><input type="submit" value="SUBMIT" ></div></br>
			</div>
			
	</form>
</body>
</html>
<?php
        include_once("users.php");
		$obj=new users();
			
			if (!isset($_REQUEST['fname'])){
			    echo "Please fill the necessary slots";
			}
			else{
			$address=$obj->addAddress($_REQUEST['employeeId'],$_REQUEST['streetName'],$_REQUEST['houseNumber'],
			$_REQUEST['city'],$_REQUEST['province'],$_REQUEST['postalCode']);
			if (!$address){
					echo "Error occurred when updating address table";
				} else {
					echo "address updated";
				}
			
			$r=$obj->addStatus($_REQUEST['employeeId'],$_REQUEST['sFName'],$_REQUEST['sLName'],$_REQUEST['status'],
			$_REQUEST['spouseEmployer'],$_REQUEST['spousePhone']);
					
			if (!$r){
					echo "Error occurred when updating status table";
				} else {
					echo "status updated";
				}
				
				
			$jobInfo=$obj->addJobInfo($_REQUEST['employeeId'],$_REQUEST['jobTitle'],$_REQUEST['supervisor'],$_REQUEST['jobDescription'],
			$_REQUEST['officeEmail'],$_REQUEST['primaryPhone'],$_REQUEST['altPhone'],$_REQUEST['typeEmployment'],
			$_REQUEST['start'],$_REQUEST['finish']);
			
			if (!$jobInfo){
					echo "Error occurred when updating jobInfo table";
				} else {
					echo "jobInfo updated";
				}
			
			$emergency=$obj->addEmergency($_REQUEST['employeeId'],$_REQUEST['Efname'],$_REQUEST['Elname'],$_REQUEST['Emname'],
			$_REQUEST['EstreetName'],$_REQUEST['EhouseNumber'],$_REQUEST['Ecity'],$_REQUEST['Eprovince'],$_REQUEST['EpostalCode'],
			$_REQUEST['EhomePhone'],$_REQUEST['EcellPhone'],$_REQUEST['relationship']);
			
			if (!$emergency){
				echo "Error occurred when updating emergency table";
			}else {
				echo "emergency updated";
			}
			}

?>