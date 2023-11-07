<?php
require_once('verificacao.php'); 

if (!verificarLogin()) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    include 'conexao.php';

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $select_query = "SELECT image_path FROM profile WHERE user_id = ?";
    $stmt = $conn->prepare($select_query);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($profile_image_path);

    if ($stmt->fetch()) {
        // O caminho da imagem de perfil foi encontrado no banco de dados
 }
}
?>



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
    <link href="css/estilo.css" rel="stylesheet" />
    <style>
    body {
        background-image: url('css/BGLOGO.png');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        display: none;
    }

    .modal-content {
        font-family: 'Be Vietnam Pro';
        font-size: 20px;
        font-weight: bold;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #91FF75;
        padding: 20px;
        border-radius: 20px;
        z-index: 1000;
        box-shadow: 8px 8px 4px 564px rgba(0, 0, 0, 0.50), 0px 8px 4px 0px #6CBD58;
    }

    .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        cursor: pointer;
    }

    .btn-regras, .btn-upload-image {
        font-family: 'Be Vietnam Pro', sans-serif;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 100px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-regras, .btn-upload-image {
        background: #FF4B4B;
        box-shadow: 0px 5px 0px 0px #FF1717, 5px 5px 4px 0px rgba(0, 0, 0, 0.25);
        color: #FFF;
        padding: 10px 20px;
    }

    .btn-regras:hover {
        background: #FF1717;
    }

    .btn-logout {
        flex: 1;
        margin: 10px;
        min-width: 0;
        width: 70px;
        height: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #FFF;
        text-align: center;
        font-family: 'Be Vietnam Pro', sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        border-radius: 36px;
        background: #FF4B4B;
        box-shadow: 0px 5px 0px 0px #FF1717, 5px 5px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .btn-upload-image:hover {
        background: #FF1717;
    }

    .modal-upload-image {
        background: #ffffff;
    }

    #uploadImageModal input[type="file"] {
        margin: 10px 0;
    }

    #uploadImageModal input[type="submit"] {
        background: #FF4B4B;
        color: #FFF;
        font-family: 'Be Vietnam Pro', sans-serif;
        font-size: 20px;
        font-weight: 600;
        height: 50px;
        width: 666px;
        border: none;
        border-radius: 100px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-radius: 100px;
        cursor: pointer;
    }

    #uploadImageModal input[type="submit"]:hover {
        background: #FF1717;
    }

    #uploadImageModal .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        cursor: pointer;
    }
</style>
</head>

<body>
   
    <div class="position-absolute top-0 end-0">
     <button id="btnRanking" class="btn-regras">
    <a href="ranking.php" style="text-decoration: none; color: inherit;">
        <img src="css/ranking.png" alt="ranking" width="60" height="50">
        <p>Ranking</p>
    </a>
    </button>
    
    
        <button id="btnRegras" class="btn-regras">
            <img src="css/regras.png" alt="regras" width="60" height="50">
            <p>Regras</p>
        </button>

        <button id="btnUploadImage" class="btn-upload-image">
            <img src="css/upload.png" alt="Upload de Imagem" width="60" height="50">
            <p>Foto de Perfil</p>
        </button>
    </div>
    
        <div class="d-flex align-items-start">
            <img src="css/MDJ.png" class="rounded float-left" alt="...">
        </div>
    
    <audio id="backgroundAudio" autoplay loop volume="0.1">
        <source src="css/audioloop.mp3" type="audio/mpeg">
    </audio>

    <div class="container-md">
        <img src="<?php echo $profile_image_path; ?>" alt="Foto de Perfil" width="50" height="50" style="border-radius: 50%;">
        <?php
        if (isset($_SESSION["user_id"]) || isset($_SESSION["username"])) {
            echo '<h6>Olá, ' . $_SESSION["username"] . '</h6>';
            echo '<h6><a href="logout.php" class="btn-logout">Sair</a></h6>';
        } else {
            header("Location: index.php");
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
                        <img src="css/AL.png" alt="Clássico">
                        <p>Clássico</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox" type="checkbox" id="tempo" name="modo_de_jogo">
                <label for="tempo">
                    <div class="circle">
                        <img src="css/TM.png" alt="Tempo">
                        <p>Tempo</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox" type="checkbox" id="modozen" name="modo_de_jogo">
                <label for="modozen">
                    <div class="circle">
                        <img src="css/AP.png" alt="Modo Zen">
                        <br>
                        <p>Modo Zen</p>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <br>
    <div class="Texto">
        Quiz Clássico, Tempo Limite e Modo Zen.
    </div>
    <p></p>
    <br>
    <div class="d-flex align-items-start">
        <img src="css/CAT.png" class="rounded float-left" alt="...">
    </div>
    <br>
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="fauna" name="tema">
                <label for="fauna">
                    <div class="circle">
                        <img src="css/Fauna.png" alt="Fauna">
                        <p>Fauna</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="flora" name="tema">
                <label for="flora">
                    <div class="circle">
                        <img src="css/Flora.png" alt="Flora">
                        <p>Flora</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="historia" name="tema">
                <label for="historia">
                    <div class="circle">
                        <img src="css/Historia.png" alt="História">
                        <p>História</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="bioma" name="tema">
                <label for="bioma">
                    <div class="circle">
                        <img src="css/Bioma.png" alt="Bioma">
                        <p>Bioma</p>
                    </div>
                </label>
            </div>
            <div class="col">
                <input class="custom-checkbox2" type="checkbox" id="tudo" name="nova_opc">
                <label for="tudo">
                    <div class="circle">
                        <img src="css/Tudo.png" alt="Tudo">
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
    <div id="regrasModal" class="modal modal-regras">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2>Regras do Jogo</h2>

            <h3>Modo Clássico:</h3>
            <ul>
                <li>O jogador terá 20 segundos para responder cada pergunta.</li>
                <li>Marcar alternativas erradas resultará em penalização de pontos.</li>
                <li>Se o tempo de 20 segundos se esgotar, a resposta será considerada errada, e o jogador deve
                    prosseguir para a próxima pergunta.</li>
            </ul>

            <h3>Modo Tempo:</h3>
            <ul>
                <li>O jogador terá 1 minuto para responder a todo o quiz.</li>
                <li>Se o tempo se esgotar, o jogador falhará e será redirecionado para a tela inicial.</li>
            </ul>

            <h3>Modo Zen:</h3>
            <ul>
                <li>O Modo Zen é uma opção de treinamento.</li>
                <li>Não haverá penalização de pontos ou marcação de tempo.</li>
                <li>Os jogadores podem usá-lo para estudos sem pressão de tempo.</li>
            </ul>
        </div>
    </div>

     <div id="uploadImageModal" class="modal modal-regras">
    <div class="modal-content">
        <span class="close" onclick="fecharUploadImageModal()">&times;</span>
        <h2>Upload de Imagem de Perfil</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_image" accept="image/*">
            <input type="submit" name="submit" value="Carregar Foto de Perfil">
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".custom-checkbox").change(function () {
                $(".custom-checkbox").not(this).prop("checked", false);
                verificarCheckboxes();
            });

            $(".custom-checkbox2").change(function () {
                $(".custom-checkbox2").not(this).prop("checked", false);
                verificarCheckboxes();
            });
        });

        function verificarCheckboxes() {
            const modoZenSelecionado = $("#modozen").is(":checked");
            const tempoSelecionado = $("#tempo").is(":checked");
            const classicoSelecionado = $("#classico").is(":checked");
            const faunaSelecionado = $("#fauna").is(":checked");
            const floraSelecionado = $("#flora").is(":checked");
            const historiaSelecionado = $("#historia").is(":checked");
            const biomaSelecionado = $("#bioma").is(":checked");
            const tudoSelecionado = $("#tudo").is(":checked");

            if (tudoSelecionado) {
                $("#btnJogar").prop("disabled", false);
            } else if (
                (modoZenSelecionado || tempoSelecionado || classicoSelecionado) &&
                (faunaSelecionado || floraSelecionado || historiaSelecionado || biomaSelecionado)
            ) {
                $("#btnJogar").prop("disabled", false);
            } else {
                $("#btnJogar").prop("disabled", true);
            }
        }

        $("#btnJogar").click(function () {
            const classicoSelecionado = $("#classico").is(":checked");
            const tempoSelecionado = $("#tempo").is(":checked");
            const modoZenSelecionado = $("#modozen").is(":checked");
            const faunaSelecionado = $("#fauna").is(":checked");
            const floraSelecionado = $("#flora").is(":checked");
            const historiaSelecionado = $("#historia").is(":checked");
            const biomaSelecionado = $("#bioma").is(":checked");

            if (classicoSelecionado) {
                if (faunaSelecionado) {
                    window.location.href = "quiz-classicoFauna.php";
                } else if (floraSelecionado) {
                    window.location.href = "quiz-classicoFlora.php";
                } else if (historiaSelecionado) {
                    window.location.href = "quiz-classicoHistoria.php";
                } else if (biomaSelecionado) {
                    window.location.href = "quiz-classicoBioma.php";
                } else {
                    window.location.href = "quiz-classico.php";
                }
            } else if (tempoSelecionado) {
                if (faunaSelecionado) {
                    window.location.href = "quiz-tempoFauna.php";
                } else if (floraSelecionado) {
                    window.location.href = "quiz-tempoFlora.php";
                } else if (historiaSelecionado) {
                    window.location.href = "quiz-tempoHistoria.php";
                } else if (biomaSelecionado) {
                    window.location.href = "quiz-tempoBioma.php";
                } else {
                    window.location.href = "quiz-tempo.php";
                }
            } else if (modoZenSelecionado) {
                if (faunaSelecionado) {
                    window.location.href = "quiz-zenFauna.php";
                } else if (floraSelecionado) {
                    window.location.href = "quiz-zenFlora.php";
                } else if (historiaSelecionado) {
                    window.location.href = "quiz-zenHistoria.php";
                } else if (biomaSelecionado) {
                    window.location.href = "quiz-zenBioma.php";
                } else {
                    window.location.href = "quiz-zen.php";
                }
            }
        });


        document.getElementById("btnRegras").addEventListener("click", function () {
            var modal = document.getElementById("regrasModal");
            modal.style.display = "block";
        });

        document.querySelector(".close").addEventListener("click", function () {
            var modal = document.getElementById("regrasModal");
            modal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            var modal = document.getElementById("regrasModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });

        function fecharModal() {
            var modal = document.getElementById("regrasModal");
            modal.style.display = "none";
        }
        document.getElementById("btnUploadImage").addEventListener("click", function () {
    var uploadImageModal = document.getElementById("uploadImageModal");
    uploadImageModal.style.display = "block";
});

function fecharUploadImageModal() {
    var uploadImageModal = document.getElementById("uploadImageModal");
    uploadImageModal.style.display = "none";
}

    </script>


</body>

</html>