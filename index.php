<?php
include('user/check_login.php');
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi List Film</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .link-item {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Aplikasi List Film</h1>
        <a href="category" class="link-item btn btn-primary">Kategori</a>
        <a href="film" class="link-item btn btn-primary">Film</a>
        <a href="user/logout.php" class="link-item btn btn-danger">Logout</a>
        <a href="user/login.php" class="link-item btn btn-secondary">Login</a>
        <a href="user/register.php" class="link-item btn btn-info">Register</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
