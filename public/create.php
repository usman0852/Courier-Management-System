<?php
include("../config/db.php");

if (isset($_POST['add_customer'])) {
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $address = $_POST['address'];
    $city    = $_POST['city'];

    $query = "INSERT INTO customers (name, phone, email, address, city)
              VALUES ('$name','$phone','$email','$address','$city')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>

<h2>Courier Management System</h2>

<form method="POST">
    Name:<br>
    <input type="text" name="name" required><br><br>

    Phone:<br>
    <input type="text" name="phone" required><br><br>

    Email:<br>
    <input type="email" name="email"><br><br>

    Address:<br>
    <input type="text" name="address"><br><br>

    City:<br>
    <input type="text" name="city"><br><br>

    <button type="submit" name="add_customer">Save</button>
</form>

<br>
<a href="index.php"></a>

</body>
</html>
