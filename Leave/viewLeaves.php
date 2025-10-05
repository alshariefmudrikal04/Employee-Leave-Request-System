<?php 
require_once "../CLASSES/request.php";
$RequestOBJ = new Request();

$keyword = " ";

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    $keyword = isset($_GET["search"]) ? trim(htmlspecialchars($_GET["search"])):" ";
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Leave Requests</title>
</head>
<body>

<h1>LIST OF LEAVE REQUESTS</h1>
<button><a href="addLeaves.php">ADD REQUEST</a></button>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>NO.</th>
        <th>Employee Name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Leave Type</th>
    </tr>
    <?php 
    $no = 1;
    $leaves = $RequestOBJ->viewLeaves();

    if ($leaves) {
        foreach($leaves as $leave){ ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $leave["employee_name"]; ?></td>
                <td><?php echo $leave["start_date"]; ?></td>
                <td><?php echo $leave["end_date"]; ?></td>
                <td><?php echo $leave["type_name"]; ?></td> 
                 <td>
         <a href="updateLeaves.php?leave_id=<?php echo $leave['leave_id']; ?>">Update</a> | 
        <a href="deleteRequestLeave.php?leave_id=<?php echo $leave['leave_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
        
    </td>
            </tr>
        <?php }
    } else {
        echo "<tr><td colspan='5'>No leave records found.</td></tr>";
    }
    ?>
</table>
    
</body>
</html>
