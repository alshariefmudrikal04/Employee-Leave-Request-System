<?php 
require_once "../CLASSES/request.php";
$RequestOBJ = new Request();
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $RequestOBJ->employee_name = trim(htmlspecialchars($_POST["employee_name"]));
    $RequestOBJ->start_date = $_POST["start_date"];
    $RequestOBJ->end_date = $_POST["end_date"];
    $RequestOBJ->leave_types = $_POST["leave_type_id"]; 

    if ($RequestOBJ->addLeaves()) {
        header("Location: viewLeaves.php");
        exit;
    } else {
        echo "Failed to add leave request.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Leave Request</title>
</head>
<body>
    <h1>Add Leave Request</h1>
    <form action="" method="post">
        <label for="employee_name">Employee Name *</label><br>
        <input type="text" name="employee_name" required><br><br>

        <label for="start_date">Start Date *</label><br>
        <input type="date" name="start_date" required><br><br>

        <label for="end_date">End Date *</label><br>
        <input type="date" name="end_date" required><br><br>

        <label for="leave_type_id">Leave Type *</label><br>
        <select name="leave_type_id" required>
            <option value="">-- Select --</option>
            <option value="1">Annual Leave</option>
            <option value="2">Sick Leave</option>
            <option value="3">Maternity Leave</option>
        </select><br><br>

        <input type="submit" value="Save Leave">
    </form>
</body>
</html>
