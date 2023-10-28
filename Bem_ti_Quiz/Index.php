

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="Css/estilo.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('Css/BGLOGO.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-start">
        <img src="Css/MDJ.png" class="rounded float-left" alt="...">
    </div>
    <div class="container-md">
        <?php
        session_start();
        if (isset($_SESSION["username"])) {
            echo '<h6>Olá, ' . $_SESSION["username"] . '</h6>';
            echo '<h6><a href="logout.php" class="btn-logout">Sair</a></h6>';
        } else {
            header("Location: Login.php");
            exit();
        }
        ?>
    </div>
    <br>
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <input class="custom-checkbox" type="checkbox" id="classico" name="modo_de_jogo">
                <label for="classico">
                    <div class="circle">
                        <img src="Css/AL.png" alt="Clássico">
                        <p>Clássico</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox" type="checkbox" id="tempo" name="modo_de_jogo">
                <label for="tempo">
                    <div class="circle">
                        <img src="Css/TM.png" alt="Tempo">
                        <p>Tempo</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox" type="checkbox" id="modozen" name="modo_de_jogo">
                <label for="modozen">
                    <div class="circle">
                        <img src="Css/AP.png" alt="Modo Zen">
                        <br>
                        <p>Modo Zen</p>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <br>
    <div class="Texto">
        Quiz clássico, aleatório e tempo limite para cada pergunta.
    </div>
    <p></p>
    <br>
    <div class="d-flex align-items-start">
        <img src="Css/CAT.png" class="rounded float-left" alt="...">
    </div>
    <br>
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="fauna" name="tema">
                <label for="fauna">
                    <div class="circle">
                        <img src="Css/Fauna.png" alt="Fauna">
                        <p>Fauna</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="flora" name="tema">
                <label for="flora">
                    <div class="circle">
                        <img src="Css/Flora.png" alt="Flora">
                        <p>Flora</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="historia" name="tema">
                <label for="historia">
                    <div class="circle">
                        <img src="Css/Historia.png" alt="História">
                        <p>História</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="bioma" name="tema">
                <label for="bioma">
                    <div class="circle">
                        <img src="Css/Bioma.png" alt="Bioma">
                        <p>Bioma</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="tudo" name="nova_opc">
                <label for="tudo">
                    <div class="circle">
                        <img src="Css/Tudo.png" alt="Tudo">
                        <p>Tudo</p>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <br>
    <button id="btnJogar" class="btn btn-primary" disabled>Jogar</button>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".custom-checkbox").change(verificarCheckboxes);
            $(".custom-checkbox2").change(verificarCheckboxes);
        });

        function verificarCheckboxes() {
            const modoZenSelecionado = $("#modozen").is(":checked");
            const tudoSelecionado = $("#tudo").is(":checked");
            const faunaSelecionado = $("#fauna").is(":checked");
            const floraSelecionado = $("#flora").is(":checked");
            const historiaSelecionado = $("#historia").is(":checked");
            const biomaSelecionado = $("#bioma").is(":checked");

            if (modoZenSelecionado && (tudoSelecionado || faunaSelecionado || floraSelecionado || historiaSelecionado || biomaSelecionado)) {
                $("#btnJogar").prop("disabled", false);
            } else {
                $("#btnJogar").prop("disabled", true);
            }
        }

        $("#btnJogar").click(function () {
            const modoZenSelecionado = $("#modozen").is(":checked");
            const tudoSelecionado = $("#tudo").is(":checked");
            const faunaSelecionado = $("#fauna").is(":checked");
            const floraSelecionado = $("#flora").is(":checked");
            const historiaSelecionado = $("#historia").is(":checked");
            const biomaSelecionado = $("#bioma").is(":checked");

            if (modoZenSelecionado && tudoSelecionado) {
                window.location.href = "quiz-zen.php";
            } else if (modoZenSelecionado && faunaSelecionado) {
                window.location.href = "quiz-zenFauna.php";
            } else if (modoZenSelecionado && floraSelecionado) {
                window.location.href = "quiz-zenFlora.php";
            } else if (modoZenSelecionado && historiaSelecionado) {
                window.location.href = "quiz-zenHistoria.php";
            } else if (modoZenSelecionado && biomaSelecionado) {
                window.location.href = "quiz-zenBioma.php";
            }
        });
    </script>

</body>

</html>
