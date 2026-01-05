<?php
// Database connection
include("../config/db.php");

// Fetch customers
$result = mysqli_query($conn, "SELECT * FROM customers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courier Management System</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        header {
            background: linear-gradient(to right, #1d2671, #c33764);
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        .container {
            padding: 30px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar h2 {
            margin: 0;
            color: #333;
        }

        .add-btn {
            background: #28a745;
            color: white;
            padding: 10px 18px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        table th {
            background: #343a40;
            color: white;
            padding: 12px;
        }

        table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .update-btn {
            background: #007bff;
            color: white;
        }

        .update-btn:hover {
            background: #0056b3;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background: #b02a37;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            padding: 15px;
            background: #343a40;
            color: white;
        }
    </style>
</head>

<body>

<header>
    <h1>Courier Management System</h1>
    <p>Customer Records Management</p>
</header>

<div class="container">

    <div class="top-bar">
        <h2>Customer List</h2>
        <a href="create.php" class="add-btn">+ Add Customer</a>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td><?php echo htmlspecialchars($row['city']); ?></td>
                <td>
                    <a href="update.php?email=<?php echo urlencode($row['email']); ?>">
                        <button class="btn update-btn">Update</button>
                    </a>

                    <a href="delete.php?email=<?php echo urlencode($row['email']); ?>"
                       onclick="return confirm('Are you sure you want to delete this customer?');">
                        <button class="btn delete-btn">Delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>

<footer>
    © 2026 Courier Management System | Developed by Muhammad Usman
</footer>

</body>
</html>
