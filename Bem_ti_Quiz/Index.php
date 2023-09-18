<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <header>
        <div class="logo">
            <?php
            session_start();
            if (isset($_SESSION["username"])) {
                echo '<h1>Bem-vindo, ' . $_SESSION["username"] . '</h1>';
                echo '<a href="logout.php" class="btn-logout">Sair</a>';
            } else {
                header("Location: Login.php"); 
                exit();
            }
            ?>
        </div>
    </header>
</body>
</html>
