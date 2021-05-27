<?php
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header('Location: /pfe/');
        die();
    }

    if($_POST['boutonGen']) {
            exec("app.py");
            header('Location: /pfe/home.php?'. sha1('volume_created'));
            die();

    } else {

        header('Location: /pfe/');
        die();

    }

?>
