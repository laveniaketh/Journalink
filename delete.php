<?php
include('database.php');

// Get the PageID from the URL parameters
$pageId = $_GET['pageId'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a delete statement
$stmt = $conn->prepare("DELETE FROM journal_entries WHERE PageID = ?");
$stmt->bind_param("i", $pageId); // Use the variable $pageId here

// Execute the delete statement and check if it was successful
if ($stmt->execute()) {
    // Deletion was successful, redirect back to home.php with a success message
    header("Location: home.php?delete_success=true");
    exit;
} else {
    // Deletion failed, redirect back to home.php with an error message
    header("Location: home.php?delete_error=true&message=" . urlencode($conn->error));
    exit;
}

// Close the statement and connection
$stmt->close();
$conn->close();


?>