<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;}
        
        form {
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ccc;}
        
        th {
            background-color: #f5f5f5;
        }
        
        .success-msg {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
        }.error-msg {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 10px;
        }
        
        .delete-link {
            color: #dc3545;
            text-decoration: none;
        }
        
        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>PHP CRUD Example</h1>

    <?php if (isset($successMsg)): ?>
        <div class="success-msg"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <?php if (isset($errorMsg)): ?>
        <div class="error-msg"><?php echo $errorMsg; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="tel" name="phone" placeholder="Phone" required><br>
        <input type="submit" name="submit" value="Create">
    </form>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a class="delete-link" href="?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</body>
</html>
