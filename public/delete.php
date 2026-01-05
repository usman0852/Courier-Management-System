<?php
include("../config/db.php");

if (!isset($_GET['email'])) {
    die("Email not found");
}

$email = mysqli_real_escape_string($conn, $_GET['email']);

$query = "DELETE FROM customers WHERE email = '$email'";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

