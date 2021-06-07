<?php
    include "connection/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <title>Hello</title>
    <style type="text/css">
        .footer {
            left: 0;
            position: fixed;
            bottom: 0;
            text-align: center;
            color: white;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="admin/admin.php"><?php echo $lang['admin'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user/user.php"><?php echo $lang['user'] ?></a>
            </li>
        </ul>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h1><?php echo $lang['title'] ?></h1>
                <p>
                    <?php echo $lang['description'] ?>
                </p>
            </div>
        </div>
    </div>

    <div class="footer bg-dark">
        <a href="index.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        | <a href="index.php?lang=fr"><?php echo $lang['lang_fr'] ?></a>
    </div>
</body>
</html>