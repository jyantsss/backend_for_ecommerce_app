<?php
include '../connection.php';
error_reporting(0);

$currentOnlineUserID = $_POST["currentOnlineUserID"];

$sqlQuery = "SELECT * FROM cart_table INNER JOIN items_table ON cart_table.items_id = items_table.items_id WHERE cart_table.user_id = '$currentOnlineUserID'";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery) {
    if ($resultOfQuery->num_rows > 0) {
        $cartRecord = array();
        while ($rowFound = $resultOfQuery->fetch_assoc()) {
            $cartRecord[] = $rowFound;
        }
        echo json_encode(array("success" => true, "currentUserCartData" => $cartRecord));
    } else {
        echo json_encode(array("success" => false, "message" => "No rows found."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Query error: " . mysqli_error($connectNow)));
}
?>
