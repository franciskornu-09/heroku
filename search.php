<?php
if(!isset($_REQUEST['search'])){
		echo '{"result":0,"message":"Table specification not provided"}';
		exit();
	}
$data="";

	include_once("users.php");
		//check if there is a user code
		if(!isset($_REQUEST['search'])){
			echo '{"result":0,"message":"Table specification not provided"}';		
			return;
		}

		$obj=new users();
		// call get user method
		$user=$_REQUEST['search'];

		if(is_numeric($user)){
		$row=$obj->searchId($user);
		if(!$row){
			echo '{"result":0,"message":"Employee not found"}';	
			return;
		}
		
	$result=$obj->fetch();
			if ($result == false){
				echo '{"result":0,"message":"Employee not found"}';	
			return;
			}else {
			while($result!=false){
				$data[]=$result;
				$result=$obj->fetch();
			}
		
			echo json_encode($data);	
		}
	}else{
		$row=$obj->searchUser($user);
		if(!$row){
			echo '{"result":0,"message":"Employee not found"}';	
			return;
		}
		
	$result=$obj->fetch();
			if ($result == false){
				echo '{"result":0,"message":"Employee not found"}';	
			return;
			}else {
			while($result!=false){
				$data[]=$result;
				$result=$obj->fetch();
			}
		
			echo json_encode($data);	
			}
		}

?>