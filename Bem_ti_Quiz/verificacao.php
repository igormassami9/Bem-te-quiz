<?php

function verificarLogin() {
    session_start();

    if (isset($_SESSION["user_id"]) && isset($_SESSION["username"])) {
        return true;
    } else {
        return false;
    }
}


?>
