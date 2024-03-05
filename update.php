<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('database.php');

$content = $_GET['content'];
// echo $content;
$date = $_GET['dateInput']; 
// echo $date;
$pageId = $_GET['pageId'];
// echo $pageId;

$encodedContent = base64_encode($content);

// Convert the date to SQL date format
$date = date('Y-m-d', strtotime($date));

// Update the content and date of the entry with the given pageId
$sql = "UPDATE journal_entries SET content = '$encodedContent', entry_date = '$date' WHERE PageID = $pageId";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: home.php?save=true");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>