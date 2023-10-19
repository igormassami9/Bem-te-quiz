<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Css/Style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<style>
body {
    background-image: url('Css/BGLOGO.png');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
    font-family: 'Be Vietnam Pro', sans-serif;
}

.quadro {
    width: 801px;
    height: 435px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    border: 2px solid #777;
    background: rgba(255, 255, 255, 0.88);
    box-shadow: 0px 8px 0px 0px #777, 4px 13px 4px 0px rgba(0, 0, 0, 0.25);
}

.rodape-placar {
    width: 210px;
    height: 63.689px;
    flex-shrink: 0;
    border-radius: 10px;
    background: #87FF69;
    box-shadow: 0px 8px 0px 0px #72D959;
    position: absolute;
    top: 15%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px 20px;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
    z-index: 2;
}

.rodape-resultado {
    position: absolute;
    width: 244px;
    height: 60px;
    flex-shrink: 0;
    top: 0;
    left: 0;
    border-radius: 0px 0px 20px 0px;
    background: #FFF;
    box-shadow: 0px 8px 0px 0px #CDCDCD;
}
</style>


<body>
    <div class="rodape-resultado">
        <h1 class="texto-rodape">Resultado</h1>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="quadro"></div>
    </div>

    <div class="rodape-placar">
        <p class="text-center fw-bold fs-2">Seu placar</p>
    </div>

</body>

</html>