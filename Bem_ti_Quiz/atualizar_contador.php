<?php
session_start();

if (isset($_POST['incrementar']) && $_POST['incrementar'] === '1') {
    if (!isset($_SESSION['contador_corretas'])) {
        $_SESSION['contador_corretas'] = 0;
    }

    $_SESSION['contador_corretas']++;
}

?>
