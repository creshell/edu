<?php
// Step 1: Database connection (replace with your actual database details)
$servername = "localhost";  // your server name
$username = "root";         // your database username
$password = "";             // your database password
$dbname = "sms";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Hash the password using bcrypt
$raw_password = '123';  // Plain password
$hashed_password = password_hash($raw_password, PASSWORD_BCRYPT);  // Hashed password

// Step 3: Prepare the SQL query to insert the new student
$sql = "INSERT INTO tbl_student (semail, spass, sfname, slname, s_account_status, sdbirth, ss_id ) VALUES (?, ?, ?, ?,?,?,?)";

// Prepare and bind the SQL statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL statement preparation failed: " . $conn->error);
}

// Bind parameters (email, password, name, course)
$student_email = "student5@example.com";
$student_name = "Acad";
$student_course = "Computer Science";
$s_account_status = "Active";
$sdbirth = "2024-01-01";
$ss_id = "SCC-18-000012345";

$stmt->bind_param("sssssss", $student_email, $hashed_password, $student_name, $student_course,$s_account_status,$sdbirth,$ss_id);

// Step 4: Execute the query and check for errors
if ($stmt->execute()) {
    echo "New student added successfully.";
} else {
    echo "Error executing query: " . $stmt->error;
}

// Step 5: Close the statement and connection
$stmt->close();
$conn->close();
?>
