<?php
include('../includes/db.php'); // Include database connection

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if it's a status update or delete request
    if (isset($_POST['status'])) {
        // Get the ID and new status from the AJAX request
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Update the account status in the database
        $stmt = $conn->prepare("UPDATE students SET s_account_status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Status updated successfully"; // Response to AJAX call
        } else {
            echo "Error updating status: " . $conn->error; // Return error message
        }

        // Close the statement
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // Handle delete request
        $id = $_POST['id'];

        // Delete the student from the database
        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Student deleted successfully"; // Response to AJAX call
        } else {
            echo "Error deleting student: " . $conn->error; // Return error message
        }

        // Close the statement
        $stmt->close();
    }
    
    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request"; // Handle invalid request
}
?>

