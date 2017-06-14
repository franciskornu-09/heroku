<?php

include_once("wrapper.php");

class users extends wrapper{
	function users(){}

/**
*Gets a user- admin/employee
*@param string username login
*@param string password login
*@return boolean returns true if the query is successful
*/
	function getUser($name, $pword){
		$strQuery="select USERNAME,PASSWORD from admin where USERNAME='$name' and PASSWORD=MD5($pword)";
		return $this->query($strQuery);
	}

/**
*Adds a user- admin/employee
*@param string firstname of user
*@param string lastname of user
*@param string middlename of user
*@param string user- type of user detail
*@return boolean returns true if the query is successful
*/
	function addUser($fname, $lname, $mname, $email,$user){
		$strQuery="insert into '$user' set FIRSTNAME='$fname', MIDDLENAME='$mname', LASTNAME='$lname',EMAIL='$email'";
		return $this->query($strQuery);
	}
/**
*Views users- admin/employees
*@param string key usertype used to retrieve user list
*@return boolean returns true if the query is successful
*/
	function viewUser($key){
		//$strQuery="select PERSONAL_ID,FIRSTNAME,LASTNAME,EMAIL from employee";
		if($key=='employee'){
			$strQuery="select PERSONAL_ID,FIRSTNAME,LASTNAME,EMAIL,CELL_PHONE from employee";
		}
		elseif($key=='admin'){
			$strQuery="select ADMIN_ID,FIRSTNAME,LASTNAME,EMAIL from admin";
		}
		return $this->query($strQuery);
	}

/**
*Searches for an employee
*@param string test keyword used to search for an employer
*@return boolean returns true if the query is correctly executed
*/
	function searchUser($test){
		if (is_string($test)){
		$strQuery="select PERSONAL_ID,TITLE,FIRSTNAME, LASTNAME, MIDDLENAME,EMAIL,GENDER,HOME_NUMBER,CELL_PHONE from employee where FIRSTNAME like'%$test%' or LASTNAME like '%$test%'";
		return $this->query($strQuery);
		}
	}

	function searchId($test){
		$strQuery="select PERSONAL_ID,TITLE,FIRSTNAME, LASTNAME, MIDDLENAME,EMAIL,GENDER,HOME_NUMBER,CELL_PHONE from employee where PERSONAL_ID=$test";
		return $this->query($strQuery);
	}
    
    /**
    *@param int ID takes the userid of the users
    *@param string user -type of user
    *@return boolean returns true if the query is successful
    */ 
    function deleteUser($ID,$user){
        $key='employee';
        if($user==$key){
            $strQuery="delete from employee where PERSONAL_ID=$ID";
        }
        else{
            $strQuery="delete from admin where ADMIN_ID=$ID";
        }
        return $this->query($strQuery);
    }
	
	/**
	*Adds information to the address table 
	*@param int employeeId, string street, string houseNum, string city,string province, string postalCode
	*@returns boolean returns true if the query is correctly executed
	*/
	function addAddress($employeeId,$street,$houseNum,$city,$province,$postalCode){
		$strQuery="insert into address set EMPLOYEE_ID=$employeeId, STREET='$street', HOUSE_NO=$houseNum,CITY='$city',
		PROVINCE='$province',POSTAL_CODE='$postalCode'";
		return $this->query($strQuery);
	}
	
	/**
	*Adds information to the addStatus table 
	*@param int personalId, string sFname, string slname, string status,string employer, string sPhone
	*@returns boolean returns true if the query is correctly executed
	*/
	function addStatus($personalId,$sFname,$sLname,$status,$employer,$sPhone){
		$strQuery="insert into status set PERSONAL_ID=$personalId,SPOUSE_FNAME='$sFname',SPOUSE_LNAME='$sLname',
		STATUS='$status',EMPLOYER='$employer',SPOUSE_PHONE='$sPhone'";
		
		return $this->query($strQuery);
	}
	
	/**
	*Adds information to the addStatus table 
	*@param int personalId, string title, string supervisor, string jobDesc,string offMail, string cellPhone,string altPhone,string jobType, date start, date finish
	*@returns boolean returns true if the query is correctly executed
	*/
	function addJobInfo($personalId,$title,$supervisor,$jobDesc,$offMail,$cellPhone,$altPhone,$jobType,$start,$finish){
		$strQuery="insert into jobInfo set PERSONAL_ID=$personalId,TITLE='$title',SUPERVISOR='$supervisor',
		OFFICE_EMAIL='$offMail',JOB_DESCRIPTION='$jobDesc',CELL_PHONE='$cellPhone',	ALT_PHONE='$altPhone',EMPLOY_TYPE='$jobType',
		START_DATE='$start',END_DATE='$finish'";
		return $this->query($strQuery);
	}
	
	/**
	*Adds information to the addEmergency table 
	*@param int personalId, string efName, string elName, string stAddress,string hNumber, string city,string province,string postalCode,string relationship,string cellPhone,string homePhone
	*@returns boolean returns true if the query is correctly executed
	*/
	function addEmergency($personalId,$efName,$elName,$stAddress,$hNumber,$city,$province,$postalCode,$relationship,$cellPhone,$homePhone){
		$strQuery="insert into emergencyInfo set PERSONAL_ID=$personalId,EF_NAME='$efName',EL_NAME='$elName',HOUSE_NUMBER='$hNumber',
		CITY='$city',PROVINCE='$province',RELATIONSHIP='$relationship',CELL_PHONE='$cellPhone',HOME_PHONE='$homePhone'";
		return $this->query($strQuery);
	}
}
?>