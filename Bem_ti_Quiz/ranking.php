<?php
require_once('verificacao.php');

if (!verificarLogin()) {
    header("Location: index.php");
    exit();
}

include 'conexao.php';

$conn = include 'conexao.php';

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

$modo_jogo = "Clássico"; // Modo de jogo padrão

if ($conn) {
    $sql = "SELECT u.username, p.*, p.pontuacao, f.image_path FROM pontuacoes p
            INNER JOIN users u ON p.user_id = u.id
            LEFT JOIN profile f ON p.user_id = f.user_id
            WHERE p.modo_jogo = ?
            ORDER BY p.pontuacao DESC
            LIMIT 10";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $modo_jogo);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Erro na conexão com o banco de dados.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('css/BGLOGO.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .rodape-placar {
            position: absolute;
            width: 100%;
            max-width: 800px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .container-placar {
            background: rgba(255, 255, 255, 0.88);
            border: 2px solid #777;
            border-radius: 20px;
            box-shadow: 0 8px 0 0 #777, 4px 13px 4px 0 rgba(0, 0, 0, 0.25);
            margin: 10px;
            padding: 10px;
        }

        .titulo-placar {
            font-size: 200%;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .nome-usuario {
            font-size: 150%;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .table {
            margin-top: 20px;
            font-size: 120%;
        }

        .top3 {
            font-weight: bold;
            background-color: gold;
        }

        .modo-jogo-buttons {
            margin-bottom: 20px;
        }

        .modo-jogo-buttons button {
            margin-right: 10px;
        }

        .profile-image {
            border-radius: 50%;
        }
        
        .btntipo{
        font-family: 'Be Vietnam Pro', sans-serif;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 100px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btntipo{
        background: #FF4B4B;
        box-shadow: 0px 5px 0px 0px #FF1717, 5px 5px 4px 0px rgba(0, 0, 0, 0.25);
        color: #FFF;
        padding: 10px 20px;
    }

    .btntipo:hover {
        background: #FF1717;
    }
    
    .botao-voltar{
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    border: none;
    padding: 5px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-family: "Be Vietnam Pro", sans-serif;
    font-weight: bold;
    font-style: italic;
    text-align: center;
    font-size: 20px;
    width: 200px; 
    height: 37px;
    position: absolute;
    bottom: 14px; 
    left: 50%;
    transform: translateX(-50%);
    box-shadow: 0px 8px 0px #CDCDCD;
    border-radius: 30px;
    }
    
    .botao-voltar:hover{
         background-color: #f0f0f0;
    }
    </style>
</head>
<body>
    <audio id="backgroundAudio" autoplay loop volume="0.1">
        <source src="css/audioloop.mp3" type="audio/mpeg">
    </audio>

    <div class="rodape-placar">
        <h1 class="titulo-placar text-center">Ranking</h1>
        <div class="container container-placar">
            <div class="modo-jogo-buttons">
                <button id="btnClassico" class="btntipo">Clássico</button>
                <button id="btnTempo" class="btntipo">Tempo</button>
            </div>
            <table id="tabelaClassico" class="table mx-auto">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th></th>
                        <th>Nome do Jogador</th>
                        <th>Modo de Jogo</th>
                        <th>Pontuação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $posicao = 1;
                    while ($row = $result->fetch_assoc()) {
                        $classe_css = '';
                        if ($posicao <= 3) {
                            $classe_css = 'top3';
                        }

                        echo "<tr class='$classe_css'>";
                        echo "<td>$posicao</td>";
                        echo "<td><img src='" . $row['image_path'] . "' alt='Foto de Perfil' width='50' height='50' class='profile-image'></td>"; 
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['modo_jogo'] . "</td>";
                        echo "<td>" . $row['pontuacao'] . "</td>";
                        echo "</tr>";
                        $posicao++;
                    }
                    ?>
                </tbody>
            </table>
            <table id="tabelaTempo" class="table mx-auto" style="display: none;">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th></th>
                        <th>Nome do Jogador</th>
                        <th>Modo de Jogo</th>
                        <th>Pontuação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $modo_jogo_tempo = "Tempo";
                    $conn = include 'conexao.php';

                    if ($conn) {
                        $sql_tempo = "SELECT u.username, p.*, p.pontuacao, f.image_path FROM pontuacoes_tempo p
                            INNER JOIN users u ON p.user_id = u.id
                            LEFT JOIN profile f ON p.user_id = f.user_id
                            WHERE p.modo_jogo = ?
                            ORDER BY p.pontuacao DESC
                            LIMIT 10";

                        if ($stmt_tempo = $conn->prepare($sql_tempo)) {
                            $stmt_tempo->bind_param("s", $modo_jogo_tempo);
                            $stmt_tempo->execute();
                            $result_tempo = $stmt_tempo->get_result();

                            $posicao_tempo = 1;
                            while ($row_tempo = $result_tempo->fetch_assoc()) {
                                $classe_css_tempo = '';
                                if ($posicao_tempo <= 3) {
                                    $classe_css_tempo = 'top3';
                                }

                                echo "<tr class='$classe_css_tempo'>";
                                echo "<td>$posicao_tempo</td>";
                                echo "<td><img src='" . $row_tempo['image_path'] . "' alt='Foto de Perfil' width='50' height='50' class='profile-image'></td>"; 
                                echo "<td>" . $row_tempo['username'] . "</td>";
                                echo "<td>" . $row_tempo['modo_jogo'] . "</td>";
                                echo "<td>" . $row_tempo['pontuacao'] . "</td>";
                                echo "</tr>";
                                $posicao_tempo++;
                            }
                        } else {
                            echo "Erro na preparação da consulta: " . $conn->error;
                        }

                        $conn->close();
                    } else {
                        echo "Erro na conexão com o banco de dados.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<button id="btnRanking" class="botao-voltar">
    <a href="home.php" style="text-decoration: none; color: inherit;">
        <p>Voltar ao Menu</p>
    </a>
</button>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('btnClassico').addEventListener('click', function() {
            document.getElementById('tabelaClassico').style.display = 'table';
            document.getElementById('tabelaTempo').style.display = 'none';
        });

        document.getElementById('btnTempo').addEventListener('click', function() {
            document.getElementById('tabelaClassico').style.display = 'none';
            document.getElementById('tabelaTempo').style.display = 'table';
        });
    </script>
</body>
</html>
