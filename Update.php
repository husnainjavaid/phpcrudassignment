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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
    } else {
        echo "Record not found.";
    }
}
?>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name"><br>
    <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email"><br>
    <input type="tel" name
