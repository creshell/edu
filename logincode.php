<?php
session_start();
include('includes/db.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Clear previous session data
session_unset();

// Prepare and execute the query for admin table
$stmt = $conn->prepare('SELECT id, password FROM admin WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($admin_id, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['user_id'] = $admin_id; 
        $_SESSION['user_type'] = 'admin';
        $_SESSION['username'] = $username;
        echo "<script>
                alert('Login successful!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Invalid username or password.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    // For Student
    $stmt = $conn->prepare('SELECT id, s_pass FROM students WHERE semail = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($student_id, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $student_id; 
            $_SESSION['user_type'] = 'student';
            $_SESSION['username'] = $username;
            echo "<script>
                    alert('Login successful!');
                    window.location.href = 'student/index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid username or password.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid username or password.');
                window.location.href = 'login.php';
              </script>";
    }
}

$stmt->close();
$conn->close();

?>
