<?php
    session_start();
    include '../SQL/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myTeam</title>
    <link rel="shortcut icon" href="../public/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }
        .login-body{
            width: 100%;
            height: 100vh;
            background: url(../public/bg-left.png) no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .create-form{
            width: 500px;
            height:560px;
            background-color: #fafafa;
            border-radius: 20px;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
            overflow: hidden;
        }
        .create-form h2{
            display: flex;
            align-items: center;
            color: #1e1e1e;
            font-size: 30px;
            justify-content: center;
            padding: 20px;
        }
        .create-form form{
            padding:0px 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .back{
            position: absolute;
            top: 50px;
            left: 50px;
            background-color: #fafafa;
            border-radius: 200px;
            width: 50px;
            height: 50px;
            color: #00a6e8;
            padding:10px 12px;
            letter-spacing: 2px;
            font-size: 24px;
        }
        label{
            width: 47%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        label h4{
            font-size: 20px;
            color: #1e1e1e;
        }
        label input{
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }
        .sm{
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 100%;
        }
        .sm input{
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }
        .labels:not(.x-lg) label input:focus{
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            border: #00a6e8 1px solid;
            transition: all ease 0.3s;
        }
        label input:focus, label select:focus{
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            border: #00a6e8 1px solid;
            transition: all ease 0.3s;
        }
        .btns{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 15px;
        }
        .btns button{
            font-size: 18px;
            padding: 15px;
            outline: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            width: 180px;
        }
        .btns button:first-child{
            border: #00a6e8 2px solid;
            background-color: transparent;
            color: #00a6e8;
            border-radius: 5px;
        }
        .btns button:last-child{
            border: #00a6e8 2px solid;
            background-color: #00a6e8;
            color: #fafafa;
            border-radius: 5px;
        }
        .btns button:first-child:hover, .btns button:last-child:hover{
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            transition: all ease 0.3s;
        }
        </style>
    </style>
</head>
<body class="login-body" style="background: url(../public/bg-login.png)">
    <a href="../PHP/home.php" class="bi bi-arrow-left back"></a>
    <div class="create-form">
        <h2>Data<img src="../public/brand.png" alt=brand />are</h2>
        <form action="" method="post">
        <?php 
            $query = "SELECT * FROM projects WHERE id = {$team['teamId']}";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $project = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '
        <label for="name" class="sm">
            <h4>Team Name</h4>
            <input type="text" name="name" id="name" required value='.$user['name'].'>
        </label>
        <label for="projet" class="sm">
            <h4>Project Name</h4>
            <input type="text" name="projet" id="projet"  value='.$user['projet'].'>
        </label>
        <label for="creationDate" class="sm">
            <h4>Creation Date</h4>
            <input type="date" name="creationDate" id="creationDate" value='.$user['date_creation'].'>
        </label>
        <label for="description" class="sm">
            <h4>Decription</h4>
            <input type="text" name="description" id="description"  value="'.$user['description'].'">
        </label>
    ';
?>
            <div class="btns">
                <button type="reset">Cancel</button>
                <button type="submit" name="modifyOne">Submit</button>
            </div>
        </form>
    </div>
    <?php

        function Redirect($url, $permanent = false){
            header('Location: ' . $url, true, $permanent ? 301 : 302);
            exit();
        }

        if (isset($_POST["modifyOne"])) {
            $nomEquipe = $_POST["nomEquipe"];
            $projet = $_POST["projet"];
            $date_creation = $_POST["creationDate"];
            $description = $_POST["description"];


            mysqli_query($connect, "UPDATE team 
            SET 
                `nomEquipe` = '$nomEquipe', 
                `date_creation` = '$date_creation', 
                `projet` = '$projet', 
                `description` = '$description'
            WHERE
                `idEquipe` = $id");        

            // Redirect('../home.php', false);

        }
    ?>
</body>
</html>
