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
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #1d2671, #c33764);
        }

        .card {
            width: 450px;
            margin: 70px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1d2671;
        }

        .btn-group {
            text-align: center;
            margin-top: 25px;
        }

        .save-btn {
            background: #28a745;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .save-btn:hover {
            background: #218838;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
            font-weight: bold;
        }

        .back-btn:hover {
            color: #000;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Add New Customer</h2>

    <form method="POST">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" required>
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" required>
        </div>

        <div class="btn-group">
            <button type="submit" name="add_customer" class="save-btn">
                Save Customer
            </button><br>

            <a href="index.php" class="back-btn">← Back to Customer List</a>
        </div>

    </form>
</div>

</body>
</html>
