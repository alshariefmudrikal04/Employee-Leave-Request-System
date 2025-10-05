<?php 
require_once "../CLASSES/request.php";
$RequestOBJ = new Request();

// Enable PDO exceptions


$error = [];

// Check if leave_id is provided
if (isset($_GET['leave_id'])) {
    $id = $_GET['leave_id'];
    $data = $RequestOBJ->getRequestById($id);
    if ($data) {
        $Leaves = $data;
    } else {
        die("Request not found!");
    }
} else {
    die("No leave ID provided!");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $RequestOBJ->employee_name = trim(htmlspecialchars($_POST["employee_name"]));
    $RequestOBJ->start_date = $_POST["start_date"];
    $RequestOBJ->end_date = $_POST["end_date"];
    $RequestOBJ->leave_types = $_POST["leave_type_id"]; 
    $RequestOBJ->leave_id = $_GET['leave_id'];

    try {
        $rowsUpdated = $RequestOBJ->updateLeaves();
        if ($rowsUpdated) {
            header("Location: viewLeaves.php");
            exit;
        } else {
            echo "No changes were made.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Leave Request</title>
</head>
<body>
    <h1>Update Leave Request</h1>
    <form action="" method="post">
        <label for="employee_name">Employee Name *</label><br>
        <input type="text" name="employee_name" value="<?php echo $Leaves['employee_name'] ?? ''; ?>" required><br><br>

        <label for="start_date">Start Date *</label><br>
        <input type="date" name="start_date" value="<?php echo $Leaves['start_date'] ?? ''; ?>" required><br><br>

        <label for="end_date">End Date *</label><br>
        <input type="date" name="end_date" value="<?php echo $Leaves['end_date'] ?? ''; ?>" required><br><br>

        <label for="leave_type_id">Leave Type *</label><br>
        <select name="leave_type_id" required>
            <option value="1" <?php echo ($Leaves['leave_type_id']==1)?'selected':''; ?>>Annual Leave</option>
            <option value="2" <?php echo ($Leaves['leave_type_id']==2)?'selected':''; ?>>Sick Leave</option>
            <option value="3" <?php echo ($Leaves['leave_type_id']==3)?'selected':''; ?>>Maternity Leave</option>
        </select><br><br>

        <input type="submit" value="Save Leave">
    </form>
</body>
</html>
