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
    <title>SignUp</title>
    <link rel="shortcut icon" href="../public/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/style.css" type="text/css">
    <style>
        .signup-body {
            width: 100%;
            height: 100vh;
            background: url(../public/bg.png) no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-page {
            width: 70%;
            height: 75%;
            overflow: hidden;
            border-radius: 15px;
            display: flex;
            /* border: #fafafa 2px solid; */
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
        }

        .left {
            background: url(../public/bg.png) no-repeat;
            background-position: center;
            background-size: cover;
            width: 50%;
            height: 100%;
            color: #fafafa;
            padding: 60px;
            display: flex;
            flex-direction: column;
        }

        .left h2 {
            letter-spacing: 1px;
            font-size: 70px;
            margin: auto 0px;
        }

        .left img {
            width: 64px;
        }

        .right {
            width: 50%;
            height: 100%;
            background-color: #fafafa;
            padding: 30px 60px;
            color: #1e1e1e;
        }

        .labels {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #1e1e1e;
        }

        .labels:not(.x-lg) label {
            width: 47%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label h4 {
            font-size: 18px;
            color: #1e1e1e;
        }

        .right p {
            color: #1e1e1e5f;
            width: 65%;
            margin-bottom: 30px;
        }

        .right form {
            display: flex;
            flex-direction: column;
        }

        .right form h4 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .right form label {
            width: 100%;
            margin-bottom: 10px;
        }

        .right form input {
            width: 100%;
            padding: 10px 7px;
            font-size: 18px;
            border-radius: 5px;
            outline: none;
            border: #1e1e1e4c 1px solid;
        }

        .right form input:focus {
            box-shadow: #00a6e83f 0px 2px 8px 0px;
            border: #00a6e8 1px solid;
            transition: all ease 0.3s;
        }

        .right .sign {
            width: 100%;
            text-align: center;
            color: #1e1e1e;
            margin-bottom: 0px;
            margin-top: 45px;
            font-size: 18px;
        }
    </style>
</head>

<body class="signup-body">
    <div class="signup-page">
        <div class="left">
            <img src="../public/logo.png" alt="logo">
            <h2>Let's work <br> Together!</h2>
        </div>
        <div class="right">
            <h4 class="title">SignUp</h4>
            <p>Let's get started! Please create an account.</p>
            <form action="" method="post">
                <div class="labels med">
                    <label for="fname">
                        <h4>First Name</h4>
                        <input type="text" name="fname" id="fname" required placeholder="Enter First Name">
                    </label>
                    <label for="lname">
                        <h4>Last Name</h4>
                        <input type="text" name="lname" id="lname" required placeholder="Enter Last Name">
                    </label>
                </div>
                <label for="email">
                    <h4>Email</h4>
                    <input type="email" name="email" id="email" placeholder="example@gmail.com" required>
                </label>
                <div class="labels med">
                    <label for="service">
                        <h4>Service</h4>
                        <input type="text" name="service" id="service" placeholder="Full-Stack Dev">
                    </label>
                    <label for="tel">
                        <h4>Phone Number</h4>
                        <input type="tel" name="tel" id="tel" placeholder="07XXXXXXXX">
                    </label>
                </div>
                <label for="password">
                    <h4>Password</h4>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                </label>
                <div class="btns">
                    <button type="reset">Cancel</button>
                    <button type="submit" name="sendF">Submit</button>
                </div>
            </form>
            <p class="sign">Alreadt Have an account? <a href="../index.php">LogIn</a></p>
        </div>
    </div>
</body>
<?php
// function Redirect($url, $permanent = false)
// {
//     header('Location:'. $url, true, $permanent ? 301 : 302);
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $tel = $_POST['tel'];
    $password = base64_encode($_POST['password']);

    $query = "INSERT INTO users (fname, lname, email, service, tel, password) VALUES (:fname, :lname, :email, :service, :tel, :password)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':service', $service);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        $_SESSION['email'] = $email;
    } else {
        echo "Error during signup.";
    }
}
?>

</html>