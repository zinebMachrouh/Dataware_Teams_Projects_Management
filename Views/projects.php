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
    <title>Projects</title>
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

        .sub-title {
            color: #def3ff;
            font-size: 24px;
            margin-bottom: 15px;
            margin-top: 25px;

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
            color: #008fd4;
            text-decoration: none;
            transition: all ease-in-out .3s;
        }

        td a:hover {
            text-decoration: underline 1px;
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
            background-color: red;
            gap: 15px;
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


        .pro {
            margin-top: 30px;
        }

        .popup-body p {
            margin: 5px 0px;
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

            if ($user) {
                if ($user['role'] === 0) {
                    echo '<a href="#myTeams"><i class="fa-solid fa-user-group"></i>Teams</a><a href="#myProjects"><i class="fa-solid fa-bars-progress"></i>Projects</a>';
                } else if ($user['role'] === 3) {
                    echo '<a href="./projects.php"><i class="fa-solid fa-bars-progress"></i>Projects</a>';
                } else {
                    echo '';
                }
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectId = $_POST['projectId'];
            $productOwner = $_POST['productOwner'];
            $stmt = $conn->prepare("UPDATE projects SET productOwner = :productOwner WHERE id = :projectId");
            $stmt->bindParam(':productOwner', $productOwner);
            $stmt->bindParam(':projectId', $projectId);
            $stmt->execute();
            header('Location: ./dashboard.php?success=true');
            exit();
        }
        $queryP = "SELECT * FROM projects where productOwner IS NULL";
        $stmtP = $conn->prepare($queryP);
        $stmtP->execute();

        $projects = $stmtP->fetchAll(PDO::FETCH_ASSOC);
        echo "<h4 class=sub-title id=myProjects>Projects</h4>
                    <div class=fullPage>
                        <table class='teamTable'>
                        <tr>
                            <th>Project Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>";
        foreach ($projects as $project) {
            echo "
                        <tr>
                            <td>{$project['name']}</td>
                            <td>{$project['date_start']}</td>
                            <td>{$project['date_end']}</td>
                            <td>{$project['description']}</td>
                            <td>";
            echo ($project['status'] === 0) ? '<p  class=active>● Active</p>' : '<p class=done>✔ Done</p></td>';
            echo "<td><a onclick='openPopup(" . $project["id"] . ")'>Assign Product Owner</a></td>";
        }
        ?>

    </main>
    <div id="popup" class="popup">
        <div class="popup-content">
            <div class="popup-header">
                <h2>Modify User Role</h2>
                <span class="close" onclick="closePopup()">&times;</span>
            </div>
            <div class="popup-body">
                <form action="" method="post" class="formP">
                    <label for="projectId">Project ID:</label>
                    <input type="text" id="projectId" name="projectId" id="projectId" required>
                    <label for="productOwner">New Product Owner:</label>
                    <select name="productOwner" id="productOwner" required>
                        <option value="" hidden>Pick a product owner</option>
                        <?php
                        $queryPO = "SELECT * FROM users where role = 1";
                        $stmtPO = $conn->prepare($queryPO);
                        $stmtPO->execute();

                        $productOwners = $stmtPO->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($productOwners as $productOwner) {
                            echo "<option value={$productOwner['id']}>{$productOwner['fname']} {$productOwner['lname']}</option>";
                        }
                        ?>
                    </select>
                    <div class="popup-footer">
                        <button type="submit" class="btn btn-primary">Set Product Owner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openPopup(userID) {
            document.getElementById('projectId').value = userID;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        function openMyPopup() {
            document.getElementById('myPopup').style.display = 'flex';
        }

        function closeMyPopup() {
            document.getElementById('myPopup').style.display = 'none';
        }
    </script>
</body>

</html>