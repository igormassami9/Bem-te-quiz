<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="Css/Style.css" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
<img src="Css/Capricho.png" class="rounded float-start" alt="...">
<img src="Css/Logo.png" class="rounded float-start increase-size" alt="...">
<div class="position-absolute top-0 end-0">
    <div class="container-fluid">
    <div class="mb-3">
    <label for="email" class="form-label"><h4>Efetuar Login</h4></label>
    </div>
    <br>
    <div class="TextAP">
    Sejam bem-vindo! Prepare-se para testar seus     
    conhecimentos sobre a floresta Amazônica
</div>
<br>
        <form action="Login_form.php" method="POST">
        <div class="mb-3">    
        <label for="email" class="form-label"><h4>E-mail</h4></label>
            <input class="form-control " type="text" id="email" name="email" required><br>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label"><h4>Senha</h4></label>
            <input class="form-control" type="password" id="password" name="password" required><br>
        </div>
            <button type="submit" class="btn btn-warning">Logar</button>
        </form>
        
        <p>ou</p>
        <button class="btn btn-warning"><a href="Cadastro.php">Cadastro</a></button>
    </div>
</div>
</body>
</html>