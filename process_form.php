<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $grades = htmlspecialchars($_POST['grades']);  // Capture the student grades

    // Save data to a text file (optional)
    $file = "submissions.txt";
    $entry = "Name: $name\nEmail: $email\nMessage: $message\nGrades: $grades\n---\n";  // Include grades in the entry
    file_put_contents($file, $entry, FILE_APPEND);

    // Display the submitted data
    echo "<h2>Thank You for Your Submission!</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Message:</strong> $message</p>";
    echo "<p><strong>Student Grades:</strong> $grades</p>";  // Display the grades
} else {
    echo "Error: Invalid request method.";
}
?>
