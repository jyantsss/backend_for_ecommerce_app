<?php
include'../connection.php';
error_reporting(0);

//post
$user_id = $_POST['user_id'];
$items_id = $_POST['items_id'];


$sqlQuery = "INSERT INTO cart_table SET
             user_id = '$user_id',
             items_id = '$items_id'";
$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery){
    echo json_encode(array("success"=>true));

}
else{
    echo json_encode(array("success"=>false));
}
?>