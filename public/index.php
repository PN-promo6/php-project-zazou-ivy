<?php

// require("../vendor/autoload.php");

require __DIR__ . '/../vendor/autoload.php';

use Entity\Opening;
use ludk\Persistence\ORM;

$orm = new ORM(__DIR__ . '/../Resources');
$openingRepo = $orm->getRepository(Opening::class);
$openings = $openingRepo->findAll();

// use Entity\Opening;
// use Entity\User;
// $user1 = new User();
// $user1->id = 1;
// $user1->nickname = "haruka";
// $user1->password = "xxxxxxxx";

// $user2 = new User();
// $user2->id = 2;
// $user2->nickname = "Kaori";
// $user2->password = "xxxxxxxx";

// $user3 = new User();
// $user3->id = 3;
// $user3->nickname = "Sanji";
// $user3->password = "xxxxx";

// $opening1 = new Opening();
// $opening1->id = 1;
// $opening1->anime = "Naruto";
// $opening1->song = " Seishun Kyousoukyoku";
// $opening1->group = "Sambomaster";
// $opening1->description = "Ma vie cette chanson !!";
// $opening1->url_song = "https://www.youtube.com/watch?v=lilv4MvBY6E";
// $opening1->picture = "https://schizoidmouse.files.wordpress.com/2017/05/hqdefault-2.jpg";
// $opening1->user = $user1;

// $opening2 = new Opening();
// $opening2->id = 2;
// $opening2->anime = "Erased";
// $opening2->song = " Boku dake ga inai machi";
// $opening2->group = "Re:Re";
// $opening2->description = "HIHHIHIHIHIHI !!";
// $opening2->url_song = "https://www.youtube.com/watch?v=Y9G20wV0KHE&t=1s";
// $opening2->picture = "https://static.conciergeriedugeek.fr/wp-content/uploads/2018/07/Erased2.jpg";
// $opening2->user = $user1;

// $opening3 = new Opening();
// $opening3->id = 3;
// $opening3->anime = "Ergo Proxy";
// $opening3->song = "Kiri";
// $opening3->group = "Monoral";
// $opening3->description = "Grâce à cet opening j'ai pu découvrir ce groupe. La chanson est magnifique.";
// $opening3->url_song = "https://www.youtube.com/watch?v=oAXrRWLKzko";
// $opening3->picture = "https://occ-0-531-1722.1.nflxso.net/dnm/api/v6/E8vDc_W8CLv7-yMQu8KMEC7Rrr8/AAAABcPK0Hwl3RsWb3xefxq7rd8GTYkNpWuX2DXlNdOK2o1ovKLuH4Tsj9zlsB4nbNxDqGHBWCwvTuNLE-huIlw_Y1Zuqvuc.jpg?r=b79";
// $opening3->user = $user3;

// $opening4 = new Opening();
// $opening4->id = 4;
// $opening4->anime = "Noragami Aragoto";
// $opening4->song = "Hey kids";
// $opening4->group = "The oral cigarettes";
// $opening4->description = "🥰🥰🥰🥰🥰🥰🥰🥰🥰 ";
// $opening4->url_song = "https://www.youtube.com/watch?v=C-o8pTi6vd8";
// $opening4->picture = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQEcMAQGfBPUlHtbIigxtpwENTJnkWLUH3WAV8ITCF9qCB66INf&usqp=CAU";
// $opening4->user = $user1;

// $opening5 = new Opening();
// $opening5->id = 5;
// $opening5->anime = "Sword Art Online";
// $opening5->song = "Crossing Field ";
// $opening5->group = "AmaLee";
// $opening5->description = "Babababa what a song ??! Yume de takaku tondaaaaaaaaaaaaaaa ";
// $opening5->url_song = "https://www.youtube.com/watch?v=OsLY7DXWsF4";
// $opening5->picture = "https://static.lpnt.fr/images/2017/05/19/8717859lpw-8742922-article-jpg_4300593_980x426.jpg";
// $opening5->user = $user2;

// $opening6 = new Opening();
// $opening6->id = 6;
// $opening6->anime = "One punch man";
// $opening6->song = "THE HERO";
// $opening6->group = "JAM Project";
// $opening6->description = "OMG OMG OMG OMGGGGGG I LOVE IT !!!! ";
// $opening6->url_song = "https://www.youtube.com/watch?v=atxYe-nOa9w";
// $opening6->picture = "https://cdn-biiinge.konbini.com/files/2018/08/onepunchman-feat-1.jpg";
// $opening6->user = $user2;

// $openings = array($opening1, $opening2, $opening3, $opening4, $opening5, $opening6);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title> Kaîko-bu! 漫画</title>
    <link href="https://fonts.googleapis.com/css2?family=Skranji&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@515&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <a id="logo" class="navbar-brand" href="#">Kaîko-bu! 漫画</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign in</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Sign up</button>
                    <!-- <a class="nav-link" href="#">Sign up</a> -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- *************************HEADER********************************* -->
    <header id="image">

        <h1>Retrouvez vos meilleurs Openings d'anime !</h1>

    </header>

    <!-- *********************************************************************** -->

    <article id="topWeek">
        <h2>
            <strong> Top de la semaine</strong></h2>
    </article>

    <div class="container mt-4">
        <div class="row">

            <?php
            foreach ($openings as $opening) { ?>
                <div class="card col-lg-5 my-4 mx-4 shadow-sm">
                    <h5 class="my-1 font-weight-normal"><em><?php echo " Add by " . $opening->user->nickname; ?></em></h5>
                    <img src="<?php echo $opening->picture; ?>" class="card-img-top" alt="opening_image">
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>
                                <h2 id="title"><strong><?php echo $opening->anime; ?></strong></h2>
                            </li>
                            <li>
                                <h5><strong>Titre : </strong><?php echo $opening->song; ?></h5>
                            </li>
                            <li>
                                <h5><strong> Groupe : </strong><?php echo $opening->group; ?></h5>
                            </li>
                            <li>
                                <h5><strong>Description : </strong><?php echo $opening->description; ?></h6>
                            </li>
                            <li><a href="<?php echo $opening->url_song; ?>" target="blank">Lien vers l'opening</a></li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Add to list</a>
                        <p class="card-text"><small class="text-muted"></small></p>
                    </div>
                </div>
            <?php  } ?>
        </div>

        <!-- ***************************************************************** -->

        <!-- <div class="card  col-lg-6 mb-2">
                <img src="images/ergo.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ergo proxy</h5>
                    <p class="card-text">Monoral - Kiri</p>
                    <p class="card-text">Bababa ça claque !</p>

                    <a href="#" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="card col-lg-6 mb-2">
                <img src="images/bleach.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bleach</h5>
                    <p class="card-text">Orange range - Asterik</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-lg-6 mb-2">
                <img src="images/code.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Code geass</h5>
                    <p class="card-text">Flow - Colors</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-lg-6 mb-2">
                <img src="images/Erased1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Erased</h5>
                    <p class="card-text">Re:Re - Boku dake ga inai machi</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-lg-6 mb-2">
                <img src="images/gto.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> GTO</h5>
                    <p class="card-text">porno Graffiti - Hitori no yoru</p>
                    <a href="#" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="card col-lg-6 mb-2">
                <img src="images/siniki.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> Shingeki no Kyojin</h5>
                    <p class="card-text">Linked Horizon - Shinzou wo Sasageyo!</p>
                    <a href="#" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="card col-lg-6 mb-2">
                <img src="images/siniki.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> Shingeki no Kyojin</h5>
                    <p class="card-text">Linked Horizon - Shinzou wo Sasageyo!</p>
                    <a href="#" class="btn btn-primary">Add</a>
                </div> -->
        <!-- </div> -->

    </div>
    <!-- ***************************************FOOTER******************************************** -->
    <hr>
    <footer class="blog-footer text-center">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
    <!-- ************************************************************************************ -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>