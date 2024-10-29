<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/db.php');

// Query for scholars only
$sql = "SELECT id, sfname, smname, slname, scourse, syear, scontact, semail, s_account_status FROM students WHERE is_scholar = 1";
$result = $conn->query($sql);


if (!$result) {
    die("Query Failed: " . $conn->error);  // Show a more detailed error message if the query fails
}
?>                    

<div class="container-fluid">
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Scholars</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Course</th>
                        <th>Current Year Level</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Scholarship Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['slname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sfname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['scourse']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['syear']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['scontact']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['semail']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['s_account_status']) . "</td>";
                        echo "<td>" . (!empty($row['sscholarship_type']) ? htmlspecialchars($row['sscholarship_type']) : "") . "</td>";
                        echo "<td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No data available</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
            </div>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();  // Initialize DataTables
});
</script>

<?php
include('includes/scripts.php');
?>