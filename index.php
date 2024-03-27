<?php
include('./db/config.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM utilisateur WHERE logins = ? AND pass = ?';

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($res);
    if ($row) {
        if ($row['type'] == 'user') {
            header('location:userinter.php');
            exit();
        } else if ($row['type'] == 'administrateur') {
            header('location:admininter.php');
            exit();
        } else {
            echo 'Invalid user type';
        }
    } else {
        echo 'Password or username incorrect';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-label {
            color: #333;
            font-size: 16px;
            transition: transform 0.3s, font-size 0.3s, color 0.3s;
            display: block;
        }

        .form-control:focus+.form-label,
        .form-control:not(:placeholder-shown)+.form-label {
            transform: translateY(-110%) translateX(-10%);
            font-size: 12px;
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <form action="#" method="POST">
            <div class="form-group">
                <input type="text" name="user" class="form-control" required />
                <label class="form-label" for="user">Login</label>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" required />
                <label class="form-label" for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>
    </div>
</body>

</html>