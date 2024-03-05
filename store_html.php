<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('database.php');

$content = $_GET['content'];
// echo $content;
$date = $_GET['dateInput']; 
// echo $date;

$encodedContent = base64_encode($content);

// Convert the date to SQL date format
$date = date('Y-m-d', strtotime($date));

// Add a new column for the date in your SQL query
$sql = "INSERT INTO journal_entries (content, entry_date) VALUES ('$encodedContent', '$date')";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: home.php?save=true");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
