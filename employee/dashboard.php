<?php
// (Optional) include session check later
// include('../config/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Dashboard</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>
  <?php include('../includes/header.php'); ?>
  <?php include('../includes/sidebar.php'); ?>

  <!-- MAIN CONTENT -->
  <main class="content" style="margin-left:260px; padding:80px 20px 20px;">
    <div class="container-fluid">
      <h4 class="fw-bold mb-4">Employee Dashboard</h4>

      <!-- Stat Cards -->
      <div class="row g-3">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm p-3">
            <h6 class="text-muted">Available Tokens</h6>
            <h3 class="fw-bold text-primary">8 / 10</h3>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm p-3">
            <h6 class="text-muted">Leaves Taken</h6>
            <h3 class="fw-bold text-success">2 Days</h3>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm p-3">
            <h6 class="text-muted">Pending Requests</h6>
            <h3 class="fw-bold text-warning">1</h3>
          </div>
        </div>
      </div>

      <!-- Leave History Table -->
      <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white fw-bold">Recent Leave Requests</div>
        <div class="card-body">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Date Requested</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Oct 5, 2025</td>
                <td>Vacation</td>
                <td>Oct 20, 2025</td>
                <td>Oct 22, 2025</td>
                <td>Family trip</td>
                <td><span class="badge bg-warning text-dark">Pending</span></td>
              </tr>
              <tr>
                <td>Sept 10, 2025</td>
                <td>Sick Leave</td>
                <td>Sept 12, 2025</td>
                <td>Sept 13, 2025</td>
                <td>Flu</td>
                <td><span class="badge bg-success">Approved</span></td>
              </tr>
              <tr>
                <td>Aug 25, 2025</td>
                <td>Emergency</td>
                <td>Aug 26, 2025</td>
                <td>Aug 27, 2025</td>
                <td>Family emergency</td>
                <td><span class="badge bg-danger">Rejected</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <?php include('../includes/footer.php'); ?>
</body>
</html>
