<?php
include_once("users.php");
$obj=new users();
if(isset($_REQUEST['PERSONAL_ID'])){
    $ID=$_REQUEST['PERSONAL_ID'];
    $user='employee';
    $r=$obj->deleteUser($ID,$user);
    if($r==true){
        header("Location:employee_list.php");
    }
    else{
        echo"this user cannot be deleted";
    }
}

elseif(isset($_REQUEST['ADMIN_ID'])){
     $ID=$_REQUEST['ADMIN_ID'];
     $user='admin';
     $r=$obj->deleteUser($ID,$user);
     if($r==true){
        header("Location:admin_list.php");
    }
    else{
        echo"this user cannot be deleted";
    }
}
?>
