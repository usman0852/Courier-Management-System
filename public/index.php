<?php
include("../config/db.php");
$result = mysqli_query($conn, "SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers List</title>
</head>
<body>

<h2>Courier Management System</h2>

<!-- Add Customer Button -->
<a href="create.php">
    <button>Add Customer</button>
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['city']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
