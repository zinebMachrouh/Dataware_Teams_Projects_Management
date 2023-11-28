<?php
// Include your database connection file
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user ID and new role from the form
    $userID = $_POST['userID'];
    $newRole = $_POST['newRole'];

    // Perform the necessary actions to modify the user role using PDO
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");

        // Update user role in the database
        $stmt = $pdo->prepare("UPDATE users SET role = :newRole WHERE id = :userID");
        $stmt->bindParam(':newRole', $newRole);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        // Redirect or display a success message
        header('Location: modify_role.php?success=true');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <a href="#" onclick="openPopup(1)">Modify User 1 Role</a>
    <a href="#" onclick="openPopup(2)">Modify User 2 Role</a>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <form action="" method="post">
                <label for="userID">User ID:</label>
                <input type="text" id="userID" name="userID" required>
                <label for="newRole">New Role:</label>
                <input type="text" id="newRole" name="newRole" required>
                <input type="submit" value="Modify Role">
            </form>
        </div>
    </div>

</body>

</html>