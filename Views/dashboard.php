<?php
ob_start();
session_start();
include "../SQL/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../public/brand.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/6e1faf1eda.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        header {
            width: 100%;
            height: 9vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 50px;
            position: fixed;
            top: 0;
            background-color: #fafafa;
            z-index: 2;
            box-shadow: #0000002e 5px 0px 10px 0px;
        }

        header h2 {
            display: flex;
            align-items: center;
            color: #1e1e1e;
            font-size: 30px;

        }

        header nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        header nav a {
            color: #008fd4;
            text-decoration: none;
            border-bottom: 2px #fafafa solid;
            padding: 7px 15px;
            /* border-radius: 10px; */
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 10px 10px 0px 0px;
        }

        header nav a:hover {
            border-bottom: 2px #008fd4 solid;
            background-color: #def3ff;
            transition: all ease-in-out .5s;
        }

        main {
            margin-top: 9vh;
            background: url(../public/bg.png) no-repeat;
            background-position: center;
            background-size: cover;
            height: fit-content;
            width: 100%;
            padding: 20px 50px;
        }

        div.cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
            background-color: #fafafa;
            padding: 0px;
            gap: 90px;
            background-color: transparent;
        }

        .title {
            color: #fafafa;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .sub-title {
            color: #def3ff;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card {
            background-color: #fafafa;
            width: 370px;
            /* height: 370px; */
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .card-top {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 15px 15px 5px;
        }

        .card-top h4 {
            background-color: #008fd4;
            font-size: 30px;
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 200px;
            letter-spacing: 1px;
            color: #fafafa;
        }

        .card-top h2 {
            font-size: 28px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 10px 15px 5px;

        }

        .card-body p {
            font-size: 18px;
        }

        .card-body p:nth-child(2) {
            color: #308BE6;
        }

        .card-btm {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 10px;
        }

        .card-btm a:nth-child(1) {
            text-align: center;
            color: #8d99ae;
            width: 100%;
            text-decoration: none;
            font-size: 16px;
        }

        .card-btm a:nth-child(2) {
            background-color: #00a6e83f;
            padding: 15px 15px;
            text-align: center;
            font-weight: 600;
            color: #308BE6;
            width: 100%;
            text-decoration: none;
            transition: all ease 3s;
            font-size: 20px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
            justify-content: center;
            padding-left: 45px;
        }

        .card-btm a:nth-child(2) i {
            color: rgba(48, 139, 230, 0.7);
            opacity: 0;
        }

        .card-btm a:nth-child(2):hover {
            padding-left: 0px;
            transition: all ease-in-out .5s;
        }

        .card-btm a:nth-child(2):hover i {
            opacity: 1;
            transition: all ease-in-out .5s;

        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none;
        }

        .popup-content {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 400px;

        }

        .close {
            cursor: pointer;
            font-size: 18px;
        }

        .popup-header {
            background: #008fd4;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .popup-body {
            padding: 20px;
        }

        .popup-body form {
            display: flex;
            flex-direction: column;
        }

        .popup-body form input,
        .popup-body form select {
            width: 100%;
            padding: 10px 7px;
            font-size: 16px;
            border-radius: 5px;
            outline: none;
            border: #1e1e1e4c 1px solid;
            margin-bottom: 15px;
        }

        .popup-body form label {
            color: #008fd4;
            font-size: 16px;
            font-weight: 600;
        }

        .popup-footer {
            text-align: right;
            padding: 10px 0px;
            background: #f8f9fa;
        }

        .popup-footer button {
            background-color: #008fd4;
            color: #fafafa;
            padding: 7px 10px;
            border: none;
            outline: none;
            font-size: 16px;
            border-radius: 7px;

        }

        .fullPage {
            height: 79.8vh;
            overflow: hidden;
        }

        .fullPage h4 {
            color: #def3ff;

        }

        .side {
            height: 100px;
            width: 10px;
            background-color: #008fd4;
            border-radius: 15px;
            margin-right: 10px;
        }

        .team {
            padding: 10px;
            display: flex;
            background-color: #fafafa;
            border-radius: 10px;
            height: fit-content;
            width: 300px;
        }
    </style>
</head>

<body>
    <header>
        <h2>Data<img src=../public/brand.png alt=brand />are</h2>
        <nav>
            <a href="#"><i class="fa-solid fa-house"></i> Home</a>
            <?php
            $email = $_SESSION['email'];

            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if ($user['role'] === 0 || $user['role'] === 3) {
                    echo '';
                } else if ($user['role'] === 1) {
                    echo '<a href="#"><i class="fa-solid fa-plus"></i>Create Project</a>';
                } else if ($user['role'] === 2) {
                    echo '<a href="#"><i class="fa-solid fa-plus"></i>Create Team</a>';
                } else {
                    echo '';
                }
            } else {
                echo 'User not found';
            }

            ?>
            <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> LogOut</a>
        </nav>
    </header>
    <main>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userID = $_POST['userID'];
            $newRole = $_POST['newRole'];
            $stmt = $conn->prepare("UPDATE users SET role = :newRole WHERE id = :userID");
            $stmt->bindParam(':newRole', $newRole);
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            header('Location: dashboard.php?success=true');
            exit();
        }
        ?>
        <div class="hero">
            <?php
            echo '<h2 class=title>Hello ' . ucfirst($user['fname']) . ' ' . ucfirst($user['lname']) . '</h2>';

            if ($user['role'] === 3) {
                echo '<h4 class=sub-title>All Users : </h4>';
                echo '<div class=cards>';

                $query = "SELECT * FROM users where role != 3";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($users as $user) {
                    echo "<div class=card>
                                <div class=card-top>
                                    <h4>" . substr($user['fname'], 0, 1) . "" . substr($user['lname'], 0, 1) . "</h4>
                                    <h2>" . $user['fname'] . " " . $user['lname'] . "</h2>
                                </div>
                                <div class=card-body>
                                    <p>" . $user['email'] . "</p>
                                    <p>Tel: " . $user['tel'] . "</p>
                                </div>
                                <div class=card-btm>
                                    <a href=#><i class='fa-solid fa-location-dot' style='margin-right:5px;'></i>" . $user['service'] . "</a>";
                    echo ($user['role'] === 0) ? "<a onclick='openPopup(" . $user["id"] . ")'>Member <i class='fa-solid fa-pencil'></i></a>" : (($user['role'] === 1) ? "<a onclick='openPopup(" . $user["id"] . ")'>Product Owner <i class='fa-solid fa-pencil'></i></a>" : (($user['role'] === 2) ? "<a onclick='openPopup(" . $user["id"] . ")'>Scrum Master <i class='fa-solid fa-pencil'></i></a>" : ""));
                    echo "</div>
                            </div>";
                }
                echo '</div>';
            } else if ($user['role'] === 1) {
                echo '<h4 class=sub-title>All Users : </h4>';
            } else if ($user['role'] === 2) {
                echo '<a href="#"><i class="fa-solid fa-plus"></i>Create Team</a>';
            } else {
                if ($user['teamId'] === NULL) {
                    echo '<div class=fullPage><h4>No Teams <br>No Projects</h4></div>';
                } else {
                    $query = "SELECT * FROM teams WHERE id = {$user['teamId']}";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $team = $stmt->fetch(PDO::FETCH_ASSOC);

                    $query1 = "SELECT * FROM projects WHERE id = {$team['projectId']}";
                    $stmt1 = $conn->prepare($query1);
                    $stmt1->execute();
                    $project = $stmt1->fetch(PDO::FETCH_ASSOC);

                    echo "<h4>Team</h4>";
                    echo "
                        <div class='team'>
                            <div class='side'></div>
                            <div class='card-main'>
                                <h4>" . $team['name'] . "</h4>
                                <p>" . $team['description'] . "</p>
                                <p style='color: #8d99ae;'><i class='fa-regular fa-clock' style='margin-right:5px;'></i>" . $team['created-at'] ."</p>
                                <h4>Project:</h4>
                                <a href=#>".$project['name']."</a>
                            </div>
                        </div>
                    ";
                }
            }
            ?>
        </div>
        <div id="popup" class="popup">
            <div class="popup-content">
                <div class="popup-header">
                    <h2>Modify User Role</h2>
                    <span class="close" onclick="closePopup()">&times;</span>
                </div>
                <div class="popup-body">
                    <form action="" method="post">
                        <label for="userID">User ID:</label>
                        <input type="text" id="userID" name="userID" id="userId" required>
                        <label for="newRole">New Role:</label>
                        <select name="newRole" id="newRole" required>
                            <option value="0">Member</option>
                            <option value="1">Product Owner</option>
                            <option value="2">Scrum Master</option>
                        </select>
                        <div class="popup-footer">
                            <button type="submit" class="btn btn-primary">Modify Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function openPopup(userID) {
            document.getElementById('userID').value = userID;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

</body>

</html>