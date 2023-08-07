<?php
include'../connection.php';
error_reporting(0);

//post
$useremail = $_POST['user_email'];
$password = md5($_POST['user_pw']);
$bankname = $_POST['bankname'];
$accountno = $_POST['acc_no'];

$sqlQuery = "INSERT INTO users_table SET
             user_email = '$useremail',
             user_pw = '$password',
             bankname = '$bankname',
             acc_no = '$accountno'";
$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery){
    echo json_encode(array("success"=>true));

}
else{
    echo json_encode(array("success"=>false));
}

