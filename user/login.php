<?php
include'../connection.php';
error_reporting(0);

//post
$useremail = $_POST['user_email'];
$password = md5($_POST['user_pw']);

$sqlQuery = "SELECT * FROM  users_table WHERE
             user_email = '$useremail' AND
             user_pw = '$password'
             ";
$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0){
    $userRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc()){
        $userRecord[] =$rowFound;
        }
    echo json_encode(array("success"=>true, "userData"=>$userRecord[0]));

}
else{
    echo json_encode(array("success"=>false));
}

