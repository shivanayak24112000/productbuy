<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['idd'])) {
    // If the user is logged in, destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit();
}
?>
