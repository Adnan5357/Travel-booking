<?php
include 'connection.php';  // Include the connection file

// Check if 'username' is passed in the URL
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Create DELETE query
    $delete_query = "DELETE FROM userinfo WHERE Username='$username'";

    // Execute the query
    if (mysqli_query($con, $delete_query)) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

// Redirect back to the main page (optional)
header("Location: view.php");  // Replace 'index.php' with your actual page that lists data
exit;
?>