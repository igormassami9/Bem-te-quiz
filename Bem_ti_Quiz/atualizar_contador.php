<?php
session_start();

if (isset($_POST['incrementar']) && $_POST['incrementar'] === '1') {
    if (!isset($_SESSION['contador_corretas'])) {
        $_SESSION['contador_corretas'] = 0;
    }

    $_SESSION['contador_corretas']++;
}


if (isset($_POST['incrementar_erradas']) && $_POST['incrementar_erradas'] === '1') {
    if (!isset($_SESSION['contador_erradas'])) {
        $_SESSION['contador_erradas'] = 0;
    }

    $_SESSION['contador_erradas']++;
}


?>
