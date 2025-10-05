<?php
require_once "../CLASSES/request.php";
$RequestObj = new Request();

if (isset($_GET['leave_id'])) {
    $RequestObj->leave_id = $_GET['leave_id'];
    if ($RequestObj->deleteRequestLeave()) {
        header("Location: viewLeaves.php");
        exit;
    } else {
        echo "Failed to Delete Request Leave!";
    }
} else {
    echo "No ID provided!";
}
