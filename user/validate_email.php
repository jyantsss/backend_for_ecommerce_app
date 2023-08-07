<?php
include'../connection.php';
error_reporting(0);

$useremail = $_POST['user_email'];

$sqlQuery = "SELECT * FROM users_table WHERE user_email = '$useremail'";


$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0){
    echo json_encode(array("emailfound"=>true));

}
else{
    echo json_encode(array("emailfound"=>false));
}

$connectNow->close();
?>