<?php
$dbHost = '127.0.0.1';
$dbUsername = 'root';
$dbPassword = 'husnain';
$dbName = 'crudassignment1';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if (mysqli_query($conn, $sql)) {
        echo "Record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="tel" name="phone" placeholder="Phone"><br>
    <input type="submit" name="submit" value="Create">
</form>
