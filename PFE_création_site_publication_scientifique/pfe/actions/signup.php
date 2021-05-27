<?php

    spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';
    });

    session_start();
    if(isset($_SESSION['user_id'])) {
        if(User::findBy($_SESSION['user_id'])) {
            header('Location: /pfe/');
            die();
        }
    }

    if(!isset($_POST['signup_name']) || !isset($_POST['signup_email']) || !isset($_POST['signup_password']) || !isset($_POST['signup_job'])) {
        header('Location: /pfe/');
        die();
    }

    $name = $_POST['signup_name'];
    $email = $_POST['signup_email'];
    $password = sha1($_POST['signup_password']);
    $job = $_POST['signup_job'];
    $type = $_POST['signup_type'];

    if(User::findBy($email, 'email') == null) {

        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setJob($job);
        $user->setType($type);

        if(User::addUser($user)) {

            //user added successfully

            User::sendVerificationEmail($user);

            header('Location: /pfe/?'. sha1('user_added'));
            die();

        } else {

            //User not added
            header('Location: /pfe/?'. sha1('exc_problem'));
            die();

        }

    } else {

        //Email already used by another account
        header('Location: /pfe/?'. sha1('email_used'));
        die();

    }


?>