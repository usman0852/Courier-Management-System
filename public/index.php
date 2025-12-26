<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once __DIR__ . '/../Config/db.php';

$message = "";

/* ===============================
   HANDLE FORM SUBMISSION
================================ */
if (isset($_POST['submit'])) {

    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $address = $_POST['address'];
    $city    = $_POST['city'];

    /* ===============================
       CHECK DUPLICATE EMAIL
    ================================ */
    $check = mysqli_prepare(
        $conn,
        "SELECT customer_id FROM Customers WHERE email = ?"
    );
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        $message = "This email already exists!";
    } else {

        /* ===============================
           INSERT CUSTOMER
        ================================ */
        $sql = "INSERT INTO Customers (name, phone, email, address, city)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $name,
            $phone,
            $email,
            $address,
            $city
        );

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?success=1");
            exit;
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}

/* ===============================
   SUCCESS MESSAGE
================================ */
if (isset($_GET['success'])) {
    $message = "Customer added successfully!";
}

/* ===============================
   FETCH CUSTOMERS
================================ */
$result = mysqli_query(
    $conn,
    "SELECT customer_id, name, phone, email, address, city FROM Customers"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courier Management System</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 90%; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; }
        input { padding: 6px; margin: 4px 0; width: 220px; }
        input[type=submit] { width: auto; }
        .message { color: green; }
        .error { color: red; }
    </style>
</head>
<body>

<h2>Courier Management System</h2>

<?php
if ($message != "") {
    echo "<p class='message'>$message</p>";
}
?>

<!-- ===============================
     CUSTOMER FORM
================================ -->
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br>

    <label>Address:</label><br>
    <input type="text" name="address" required><br>

    <label>City:</label><br>
    <input type="text" name="city" required><br><br>

    <input type="submit" name="submit" value="Add Customer">
</form>

<!-- ===============================
     DISPLAY CUSTOMERS
================================ -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
    </tr>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['customer_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['address']}</td>
                <td>{$row['city']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}
?>
</table>

</body>
</html>
