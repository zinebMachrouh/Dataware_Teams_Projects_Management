<?php
    session_start();
    include "../SQL/connect.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../public/brand.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="../public/style.css"> -->
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
            height: 91vh;
            width: 100%;
            padding:20px 50px;
        }

        div.table {
            /* display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            align-items: center;
            background-color: #fafafa;
            padding: 0px;
            gap: 90px;
            background-color: transparent; */
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
                $query = "SELECT * FROM users where email = $email";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . "<br>";
                }
            ?>
            <a href="#"><i class="fa-solid fa-plus"></i> Add</a>
            <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> LogOut</a>
        </nav>
    </header>
    <main>
        <h2>First Last Name's Teams</h2>
        <div class="cards">
            <?php
                
            ?>
        </div>
    </main>
</body>

</html>