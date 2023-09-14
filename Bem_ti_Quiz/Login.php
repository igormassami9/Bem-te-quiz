<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<img src="Css/Capricho.png" class="rounded float-start" alt="...">
<img src="Css/Logo.png" class="rounded float-start increase-size" alt="...">
<div class="position-absolute top-0 end-0">
    <div class="container-fluid">
    <h2>Login</h2>
        <form action="processar_login.php" method="POST">
        <div class="mb-3">    
        <label for="email" class="form-label">E-mail:</label>
            <input class="form-control " type="text" id="email" name="email" required><br>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input class="form-control" type="password" id="senha" name="senha" required><br>
        </div>
            <button type="submit" class="btn btn-warning">Logar</button>
        </form>
        
        <p>ou</p>
        <button class="btn btn-warning">Cadastrar</button>
    </div>
</div>
</body>
</html>