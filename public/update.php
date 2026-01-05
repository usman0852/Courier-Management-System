<?php
include("../config/db.php");

if (!isset($_GET['email'])) {
    die("Customer not found");
}

$email = mysqli_real_escape_string($conn, $_GET['email']);

$result = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];
    $city    = $_POST['city'];

    $update = "UPDATE customers 
               SET name='$name', phone='$phone', address='$address', city='$city' 
               WHERE email='$email'";

    mysqli_query($conn, $update);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Customer</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #1d2671, #c33764);
        }

        .card {
            width: 420px;
            margin: 80px auto;
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
            margin-bottom: 5px;
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

        .update-btn {
            background: #007bff;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .update-btn:hover {
            background: #0056b3;
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
    <h2>Update Customer</h2>

    <form method="post">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($data['phone']); ?>" required>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($data['address']); ?>" required>
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($data['city']); ?>" required>
        </div>

        <div class="btn-group">
            <button type="submit" name="update" class="update-btn">Update Customer</button><br>
            <a href="index.php" class="back-btn">← Back to Customer List</a>
        </div>

    </form>
</div>

</body>
</html>
