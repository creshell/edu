<?php
session_start();
include('includes/db.php'); // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentid = $_POST['studentid'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password

    // Initialize error array
    $errors = [];

    // File upload logic for "Study Load" image
    if ($_FILES["studyload"]["error"] == UPLOAD_ERR_NO_FILE) {
        $errors['studyload'] = "Study Load image is required.";
    } else {
        $fileName = $_FILES["studyload"]["name"];
        $fileSize = $_FILES["studyload"]["size"];
        $tmpName = $_FILES["studyload"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtension)) {
            $errors['studyload'] = "Invalid image extension. Allowed: jpg, jpeg, png.";
        } else if ($fileSize > 1000000) {
            $errors['studyload'] = "Image size is too large. Max size is 1MB.";
        } else {
            // Generate a unique file name and save the file
            $newImageName = uniqid() . '.' . $imageExtension;
            if (!move_uploaded_file($tmpName, 'img/' . $newImageName)) {
                $errors['studyload'] = "Error saving the file.";
            }
        }
    }

    // Check for any errors
    if (!empty($errors)) {
        // Handle errors (e.g., store in session and redirect back)
        $_SESSION['error'] = implode(", ", $errors);
        header("Location: register.php");
        exit;
    }

    // Prepare the image path for binding
    $imagePath = 'img/' . $newImageName;

    // Insert data into the database
    $sql = "INSERT INTO students (sid, slname, sfname, semail, s_pass, simg) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $studentid, $lastname, $firstname, $email, $password, $imagePath); // Pass $imagePath

    if ($stmt->execute()) {
        // Redirect to login.php on success
        header("Location: login.php");
        exit; // Always call exit after redirect
    } else {
        // Handle SQL execution error
        $_SESSION['error'] = "Registration failed: " . $stmt->error;
        header("Location: register.php");
        exit;
    }

    $stmt->close();
}

$conn->close();
?>
