<?php

    require '../vendor/autoload.php';

    spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';
    });

    session_start();

    if(!isset($_SESSION['user_id'])) {
        header('Location: /pfe/');
        die();
    }

    if(!User::findBy($_SESSION['user_id'])->getType() == 'E') {
        header('Location: /pfe/');
        die();
    }

    if(isset($_POST['decision_submit'])) {

        if(!isset($_POST['decision_decision'])) {
            
            header('Location: /pfe/');
            die();
            
        }
        
        $article_id = $_POST['decision_article'];
        $reviewer_id = $_POST['decision_reviewer'];
        $decision = $_POST['decision_decision'];

        $editor = Editor::findBy($_SESSION['user_id']);

        if($decision == 'A') {


            $editor->acceptArticle($article_id, $reviewer_id);

            //Article accepted
            header('Location: /pfe/home.php?'. sha1('article_accepted'));
            die();

        } else if($decision == 'R') {

            $editor->rejectArticle($article_id);

            //Article Rejected
            header('Location: /pfe/home.php?'. sha1('article_rejected'));
            die();

        } else if($decision == 'C') {

            $editor->sendToCorrect($article_id, $reviewer_id);

            //Article need correction
            header('Location: /pfe/home.php?'. sha1('for_correction'));
            die();
            
        } else {
            
            //Default value
            header('Location: /pfe/');
            die();
            
        }

        //Default value
        header('Location: /pfe/');
        die();
        
    } else {

        header('Location: /pfe/');
        die();

    }

?>