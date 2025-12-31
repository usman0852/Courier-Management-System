<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "courier_management_system";

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "courier_management_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>