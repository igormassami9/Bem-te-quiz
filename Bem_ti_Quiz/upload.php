<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    if (isset($_FILES['profile_image'])) {
        $file = $_FILES['profile_image'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];

        if (!file_exists('profile')) {
            mkdir('profile', 0777, true);
        }

        $file_name = preg_replace('/[^a-zA-Z0-9_.]/', '', $file_name);

        $image_path = 'profile/' . $user_id . '_' . $file_name;

        if (move_uploaded_file($file_tmp, $image_path)) {
            include 'conexao.php';

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            $check_query = "SELECT * FROM profile WHERE user_id = ?";
            $check_stmt = $conn->prepare($check_query);

            if (!$check_stmt) {
                die("Erro na preparação da consulta: " . $conn->error);
            }

            $check_stmt->bind_param("s", $user_id);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                $update_query = "UPDATE profile SET image_path = ? WHERE user_id = ?";
                $update_stmt = $conn->prepare($update_query);

                if (!$update_stmt) {
                    die("Erro na preparação da consulta: " . $conn->error);
                }

                $update_stmt->bind_param("ss", $image_path, $user_id);
                if ($update_stmt->execute()) {
                    // Upload da imagem de perfil bem-sucedido!
                    header("Location: home.php");
                    exit; // Certifique-se de usar exit após a função header
                } else {
                    echo "Falha ao atualizar o banco de dados: " . $update_stmt->error;
                }
            } else {
                $insert_query = "INSERT INTO profile (user_id, image_path) VALUES (?, ?)";
                $insert_stmt = $conn->prepare($insert_query);

                if (!$insert_stmt) {
                    die("Erro na preparação da consulta: " . $conn->error);
                }

                $insert_stmt->bind_param("ss", $user_id, $image_path);

                if ($insert_stmt->execute()) {
                    // Upload da imagem de perfil bem-sucedido!
                    header("Location: home.php");
                    exit;
                } else {
                    echo "Falha ao atualizar o banco de dados: " . $insert_stmt->error;
                }
            }
        }
    }
}
?>
