<?php
    spl_autoload_register(function ($class_name) {
        include 'Classes/'. $class_name . '.php';
    });

    require 'vendor/autoload.php';

    // //Get user by id

    // $user = User::findBy('1');

    // if(strtolower(get_class($user)) == 'editor') {
     
    //     if($user->getEmailVerified()) {
    //         echo "email verified<br>";
    //     } else {
    //         echo "email not verified<br>";
    //     }
    // }

    // if($user->getEmailVerified()) {
    //     echo "email verified<br>";
    // } else {
    //     echo "email not verified<br>";
    // }

    // var_dump($user);

    //////////////////////////////////////////////////////////////////////////

    // //Get All Users

    // $users = User::findAll();

    // foreach($users as $user) {
    //     // if(get_class($user) == Reviewer::class) { //Check type of object
    //         echo "<br>";
    //         var_dump($user);
    //         echo "<br>";
    //     // }
    // }

    //////////////////////////////////////////////////////////////////////////

    // //Add new user
    // $user = new Editor();

    // $user->setName('Editor');
    // $user->setEmail('ed@gmail.com');
    // $user->setPassword('1790nalm');
    // $user->setJob('Admin');

    // echo User::addUser($user) ? "Author added" : "Author not added";

    //////////////////////////////////////////////////////////////////////////
    
    ////Delete user
    // $author = Author::findBy(8);
    // echo Author::deleteUser($author) ? "Author deleted" : "Author not deleted";

    //////////////////////////////////////////////////////////////////////////
    
    // //Update user
    // $author = Author::findBy(3);
    // $author->setPassword('1456790876');
    
    // echo Author::updateUser($author) ? "Author updated" : "Author not updated";
    
    //////////////////////////////////////////////////////////////////////////

    //Author Create Article

    // $author = Author::findBy(35);
    // $article = new Article();
    // $article->setTitle('First Article');
    // $article->setContent('last one');
    // $article->setDomain('Computing');

    // if($author->createArticle($article)) echo "Article Created";
    // else echo "Article not created";

    // $myArticles = $author->getMyArticles();
    // $article = $myArticles[0];

    // var_dump($article);
    // $article->createPDF();

    //////////////////////////////////////////////////////////////////////////
    
    //Get Author Articles
    
    // $author = Author::findBy(32);
    
    // $myArticles = $author->getMyArticles();
    
    // var_dump($myArticles);
    
    //////////////////////////////////////////////////////////////////////////
    
    //Author Correct Article

    // $old_article = Article::findBy(4);

    // $new_article = $old_article;

    // $new_article->setTitle('This is the last article');

    // if($author = Author::findBy($old_article->getAuthorId())->correctArticle($old_article, $new_article)) {
    //     echo "Article Corrected";
    // } else {
    //     echo "Article not corrected";
    // }

    
    //////////////////////////////////////////////////////////////////////////

    //Admins get Corrected || Accepted || waiting articles

    // $editor = Editor::findBy(11);

    // var_dump($editor->getCorrectedArticles());
    // echo "<br>";
    // echo "<br>";
    // var_dump($editor->getAcceptedArticles());
    // echo "<br>";
    // echo "<br>";
    // var_dump($editor->getWaitingArticles());

    ///////////////////////////////////////////////////////////////////////////////
    
    //Create pdf 

    // $article = Article::findBy(4)->createPDF(); //This wont work because the method createPDF is private, i made public just to test

    ////////////////////////////////////////////////////////////////////////////////

    //Admin Accept Article

    // $editor = Editor::findBy(11);
    
    // echo $editor->acceptArticle(Article::findBy(2), 33) ? "Article Accepted" : "Article not accepted";

    //Add article to reviewdArticle
    // echo ArticleReviewed::addArticleReviewed(
    //     46,
    //     37,
    //     'This is just a test for the observation'
    // );


?>  