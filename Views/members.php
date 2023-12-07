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
    <title>Members</title>
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
        }

        .sub-title {
            color: #def3ff;
            font-size: 24px;
            margin-bottom: 15px;
            margin-top: 25px;

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
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: flex-end;
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


        .pro {
            margin-top: 30px;
        }

        .popup-body p {
            margin: 5px 0px;
        }

        .popup-footer a {
            background-color: #008fd4;
            color: #fafafa;
            padding: 7px 10px;
            border: none;
            outline: none;
            font-size: 16px;
            border-radius: 7px;
            text-decoration: none;
        }

        .delete {
            background-color: #E33535 !important;
        }

        .fullPage {
            height: 79.8vh;
            overflow: hidden;
        }

        .fullPage h4 {
            color: #def3ff;

        }

        .side {
            height: 160px;
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

        .card-main h4 {
            margin-bottom: 15px;
        }

        .teamTable {
            background-color: #fafafa;
            border: 2px solid #008fd4;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-bottom: 2px solid #008fd4;
            padding: 15px;
            text-align: left;
            width: 200px;
            color: #1e1e1e;
        }

        th {
            background-color: #def3ff;
        }

        td a {
            text-decoration: none;
            margin-right: 20px;
            transition: all ease-in-out .3s;
        }

        td a:nth-child(1) {
            color: #008fd4;
        }

        td a:nth-child(2) {
            color: #5476E4;
        }

        td a:nth-child(3) {
            color: #E33535;
        }

        td p {
            padding: 7px 10px;
            font-weight: 600;
            width: 100px;
            text-align: center;
            border-radius: 25px;
        }

        .done {
            background-color: #3ebf9d68;
            color: #3ebf9d;
        }

        .active {
            background-color: #00a6e83f;
            color: #008fd4;

        }

        .add {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .add a {
            padding: 10px 15px;
            background: rgba(222, 243, 255, 0.31);
            border-radius: 10px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            backdrop-filter: blur(9.2px);
            color: #def3ff;
            font-weight: 500;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all ease-in-out .3s;
            -webkit-backdrop-filter: blur(9.2px);
        }

        .add a:hover {
            transform: scale(1.1);
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <h2>Data<img src=../public/brand.png alt=brand />are</h2>
        <nav>
            <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
            <?php
            $email = $_SESSION['email'];

            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['id'];

            if ($user) {
                if ($user['role'] === 0) {
                    echo '<a href="#myTeams"><i class="fa-solid fa-user-group"></i>Teams</a><a href="#myProjects"><i class="fa-solid fa-bars-progress"></i>Projects</a>';
                } else if ($user['role'] === 3) {
                    echo '<a href="./projects.php"><i class="fa-solid fa-bars-progress"></i>Projects</a>';
                } else {
                    echo '';
                }
                echo '<a href="#" onclick="openAddPopup()"><i class="fa-solid fa-plus"></i> Add Member</a>';
            } else {
                echo 'User not found';
            }

            ?>
            <a href="#" onclick="openMyPopup()"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> LogOut</a>
        </nav>
    </header>

    <div id="myPopup" class="popup">
        <div class="popup-content">
            <div class="popup-header">
                <?php
                echo "
                        <h2>{$user['fname']} {$user['lname']}</h2>";
                ?>
                <span class="close" onclick="closeMyPopup()">&times;</span>
            </div>
            <div class="popup-body">
                <?php
                echo "
                    <h3>Personal information:</h3> <p>Birthdate : ";
                echo ($user['birthdate'] === NULL) ? 'empty' : '' . $user['birthdate'] . '';
                echo "</p><p>Phone Number : {$user['tel']}</p>
                    <p>Adress : ";
                echo ($user['adress'] === NULL) ? 'empty' : '' . $user['adress'] . '';
                echo "
                    </p><h3 class=pro>Professional information:</h3>
                    <p>Email : {$user['email']}</p>
                    <p>Service : {$user['service']}</p>
                    <p>Role : 
                ";
                echo ($user['role'] === 0) ? "Member" : (($user['role'] === 1) ? "Product Owner" : (($user['role'] === 2) ? "Scrum Master" : "Admin"));
                echo "</p>";
                ?>
                <div class="popup-footer">
                    <a class="delete" href="./deleteUser.php?deleteOne=<?php echo $user['id']; ?>">Delete</a>
                    <a href="./modify.php?modifyOne=<?php echo $user['id']; ?>">Modify</a>
                </div>
            </div>
        </div>
    </div>

    <main>
        <?php
        echo '<h4 class=sub-title>All Users : </h4>';
        echo '<div class="fullPage">';
        $teamId = $_GET['teamId'];
        $id = $_SESSION['user_id'];
        $query = "SELECT users.*
            FROM users
            INNER JOIN team_user ON users.id = team_user.user_id
            INNER JOIN teams ON team_user.team_id = :teamId
            WHERE teams.scrumMaster = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':teamId', $teamId, PDO::PARAM_INT);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($users) === 0) {
            echo "<h4 class='sub-title'>No members found</h4>";
        } else {
            echo "<div class='cards'>";
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
                                    <a href=#><i class='fa-solid fa-location-dot' style='margin-right:5px;'></i>" . $user['service'] . "</a>
                                    <a href='./deleteTeamUser.php?user_id=" . $user['id'] . "&team_id=" . $teamId . "'>Delete User <i class='fa-solid fa-trash-can'></i></a>
                                    </div>
                            </div>";
            }
            echo "</div>";
        }
        echo '</div>';
        ?>
        <div id="addPopup" class="popup">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $teamId;
                $member = $_POST['member'];
                $query = "INSERT INTO team_user (user_id, team_id) 
            VALUES (:user_id, :team_id)";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(':user_id', $member);
                $stmt->bindParam(':team_id', $teamId);

                $stmt->execute();
                header('Location: members.php?teamId='.$teamId);
            }
            ?>
            <div class="popup-content">
                <div class="popup-header">
                    <h2>Add Member</h2>
                    <span class="close" onclick="closeAddPopup()">&times;</span>
                </div>
                <div class="popup-body">
                    <form action="" method="post">
                        <label for="name" style="color: #008fd4; font-size: 16px; font-weight: 600;">Team Name:</label><br>
                        <input type="text" id="name" name="name" required placeholder="Enter Team Name" style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;" readonly> <br>
                        <label for="member" style="color: #008fd4; font-size: 16px; font-weight: 600;">Members:</label><br>
                        <select name="member" id="member" required style="width: 100%; padding: 10px 7px; font-size: 16px; border-radius: 5px; outline: none; border: #1e1e1e4c 1px solid; margin-bottom: 15px;">
                            <option value="" hidden>Select Member</option>
                            <?php
                            $query = "SELECT users.* FROM users LEFT JOIN team_user ON users.id = team_user.user_id WHERE users.role = 0 AND team_user.team_id IS NULL";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();

                            $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($members as $member) {
                                echo "<option value={$member['id']}>{$member['fname']} {$member['lname']}</option>";
                            }
                            ?>
                        </select>
                        <div class="popup-footer">
                            <button type="submit" class="btn btn-primary" name="addUser">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        function openMyPopup() {
            document.getElementById('myPopup').style.display = 'flex';
        }

        function closeMyPopup() {
            document.getElementById('myPopup').style.display = 'none';
        }

        function openAddPopup() {
            document.getElementById('addPopup').style.display = 'flex';
        }

        function closeAddPopup() {
            document.getElementById('addPopup').style.display = 'none';
        }
    </script>
</body>

</html>