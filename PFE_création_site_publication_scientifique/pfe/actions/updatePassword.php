<?php
    
    spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';
    });

    session_start();

    if(!isset($_SESSION['user_id'])) {
        header('Location: /pfe/');
        die();
    }

    if($_POST['password_submit']) {
        
        $user = User::findBy($_SESSION['user_id']);

        if(sha1($_POST['password_old']) != $user->getPassword()) {

            //Old password is Wrong
            header('Location: /pfe/home.php?'. sha1('password_wrong'));
            die();

        } else {

            if($_POST['password_new'] != $_POST['password_confirm']) {
                
                //New Password and Confirmation Password are not matching
                header('Location: /pfe/home.php?'. sha1('password_confirmation_wrong'));
                die();

            } else {
                
                $user->setPassword(sha1($_POST['password_new']));

            }

        }

        if(User::updateUser($user)) {

            //Password Updated
            header('Location: /pfe/home.php?'. sha1('password_updated'));
            die();

        } else {

            //Password Not updated | Server Issues
            header('Location: /pfe/home.php/?'. sha1('exc_problem'));
            die();
        }

    } else {

        header('Location: /pfe/');
        die();
    
    }

?>