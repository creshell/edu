<?php
include('../includes/db.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    // Form data
    $sfname = trim($_POST['sfname']);
    $smname = trim($_POST['smname']);
    $slname = trim($_POST['slname']);
    $sfix = $_POST['sfix'];
    $sdbirth = $_POST['sdbirth'];
    $sgender = $_POST['sgender'];
    $sctship = trim($_POST['sctship']);
    $saddress = trim($_POST['saddress']);
    $scontact = trim($_POST['scontact']);
    $semail = trim($_POST['semail']);
    $s_scholarship_type = 'CHED';

    // Validate form data (example: check for empty fields)
    if (empty($sfname)) {
        $errors['sfname'] = "First name is required.";
    }
    if (empty($slname)) {
        $errors['slname'] = "Last name is required.";
    }
    if (!filter_var($semail, FILTER_VALIDATE_EMAIL)) {
        $errors['semail'] = "Invalid email format.";
    }

    // File upload logic for "Study Load" image
    if ($_FILES["simg"]["error"] == 4) {
        $errors['simg'] = "Study Load image is required.";
    } else {
        $fileName = $_FILES["simg"]["name"];
        $fileSize = $_FILES["simg"]["size"];
        $tmpName = $_FILES["simg"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtension)) {
            $errors['simg'] = "Invalid image extension. Allowed: jpg, jpeg, png.";
        } else if ($fileSize > 1000000) {
            $errors['simg'] = "Image size is too large. Max size is 1MB.";
        } else {
            // Generate a unique file name and save the file
            $newImageName = uniqid() . '.' . $imageExtension;
            move_uploaded_file($tmpName, '../img/' . $newImageName);
        }
    }

    // If no errors, insert into database
    if (empty($errors)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO students (sfname, smname, slname, sfix, sdbirth, sgender, sctship, saddress, scontact, semail, simg, s_scholarship_type)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $sfname, $smname, $slname, $sfix, $sdbirth, $sgender, $sctship, $saddress, $scontact, $semail, $newImageName, $s_scholarship_type);

        if ($stmt->execute()) {
            echo "<script>alert('Form successfully submitted!');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
            exit();  // Make sure to exit after redirection to prevent further code execution
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Display errors
        foreach ($errors as $field => $error) {
            echo "<p>Error in {$field}: {$error}</p>";
        }
    }

    $conn->close();
}
?>
