<?php
    session_start();
    include './connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
    <link rel="shortcut icon" href="../../public/brand.png" type="image/x-icon">
    <!-- <link rel="stylesheet" type="text/css" href="../style/style.css"> -->
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
            width: 600px;
            height:730px;
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
        .labels{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #1e1e1e;

        }
        .labels:not(.x-lg) label{
            width: 47%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        label h4{
            font-size: 20px;
            color: #1e1e1e;
        }
        .labels:not(.x-lg) label input{
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
        .x-lg label{
            width: 30%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .x-lg input{
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }
        .x-lg select{
            padding: 10px 5px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #1e1e1e;
            outline: none;
        }
        .btns{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
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
<body class="login-body" style="background: url(../../public/bg-login.png)">
    <a href="../home.php" class="bi bi-arrow-left back"></a>
    <div class="create-form">
        <h2>Data<img src="../../public/brand.png" alt=brand />are</h2>
        <form action="" method="post">
        <?php 
        $id = $_GET['modifyOne'];
        $result =  mysqli_query($connect, "Select * from users inner join team on team.idEquipe = users.id_equipe where id=$id");
        $user = mysqli_fetch_assoc($result);
    echo '
        <div class="labels med">
            <label for="prenom">
                <h4>First Name</h4>
                <input type="text" name="prenom" id="prenom" required placeholder="Enter First Name" value='.$user['prenom'].'>
            </label>
            <label for="nom">
                <h4>Last Name</h4>
                <input type="text" name="nom" id="nom" required placeholder="Enter Last Name" value='.$user['nom'].'>
            </label>
        </div>
        <div class="labels lg">
            <label for="email">
                <h4>Email</h4>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" value='.$user['email'].'>
            </label>
            <label for="matricule">
                <h4>Matricule</h4>
                <input type="text" name="matricule" id="matricule" placeholder="X00N" value='.$user['matricule'].'>
            </label>
        </div>
        <div class="labels med">
            <label for="birthday">
                <h4>Birthday</h4>
                <input type="date" name="birthday" id="birthday" value='.$user['date_naissance'].'>
            </label>
            <label for="tel">
                <h4>Phone Number</h4>
                <input type="tel" name="tel" id="tel" placeholder="07XXXXXXXX" value='.$user['tel'].'>
            </label>
        </div>
        <label for="adresse" class="sm">
            <h4>Adresse</h4>
            <input type="text" name="adresse" id="adresse" placeholder="1220 Dream Street Fantasyland, FL 54321 United Imaginary States" value="'.$user['adresse'].'">
        </label>
        <div class="labels x-lg">
            <label for="service">
                <h4>Service</h4>
                <input type="text" name="service" id="service" placeholder="Full-Stack Dev" value='.$user['service'].'>
            </label>
            <label for="team">
                <h4>Team</h4>
                <select name="team" id="team">
                    <option value='.$user['idEquipe'].' hidden>'.$user['nomEquipe'].'</option>';
                            $team = mysqli_query($connect, "Select * from team");
                            while($row =  mysqli_fetch_assoc($team)) {
                                echo "<option value=".$row["idEquipe"].">".$row["nomEquipe"]."</option>";
                            }
                echo'</select>
            </label>
            <label for="status">
                <h4>Status</h4>
                <select name="status" id="status">
                    <option value="'.$user['status'].'" hidden>'.$user['status'].'</option>
                    <option value="active">Active</option>
                    <option value="congé">Congé</option>
                </select>
            </label>
        </div>
        <label for="pswd" class="sm">
            <h4>Password</h4>
            <input type="text" name="pswd" id="pswd" placeholder="XXXXXXXX" value='.$user['password'].'>
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
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $matricule = $_POST["matricule"];
            $birthday = $_POST["birthday"];
            $tel = $_POST["tel"];
            $adresse = $_POST["adresse"];
            $service = $_POST["service"];
            $team = $_POST["team"];
            $status = $_POST["status"];
            $pswd = $_POST["pswd"];

            mysqli_query($connect, "UPDATE users 
            SET 
                `matricule` = '$matricule', 
                `nom` = '$nom', 
                `prenom` = '$prenom', 
                `date_naissance` = '$birthday', 
                `service` = '$service', 
                `adresse` = '$adresse', 
                `tel` = '$tel', 
                `email` = '$email', 
                `password` = '$pswd', 
                `id_equipe` = $team, 
                `status` = '$status'
            WHERE `id` = $id");           

            // Redirect('../home.php', false);

        }
    ?>
</body>
</html>
