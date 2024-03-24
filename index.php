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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <form action="#" method="POST">
        <div class="form-outline mb-4">
            <input type="text" name="user" class="form-control" />
            <label class="form-label" for="user">Login</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Se connecté</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>