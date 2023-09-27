<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet"/>
    <title>Cadastro</title>
</head>
<body>
<figure class="figureBK">
  <img src="Css/Arvore.png" class="" alt="...">
</figure>
<div class="container d-flex justify-content-center align-items-center vh-100">       
<div class="container-sm">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h3 class="mb-4">Preencha os campos</h3>
                <form id="signup-form" method="post" action="Cadastro_form.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>