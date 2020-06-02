              <?php

                // require("../vendor/autoload.php");

                require __DIR__ . '/../vendor/autoload.php';
                session_start();

                use Entity\Opening;
                use Entity\User;
                use ludk\Persistence\ORM;

                $orm = new ORM(__DIR__ . '/../Resources');
                $manager = $orm->getManager();

                $openingRepo = $orm->getRepository(Opening::class);
                // $ope = $openingRepo->find(1);
                // $ope->description = "new description !";
                // $manager->persist($ope);
                // $manager->flush;
                $openings = $openingRepo->findAll();
                $openings = array();

                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    if (strpos($search, "@") === 0) {
                        $userRepo = $orm->getRepository(User::class);
                        $nickname = substr($search, 1);
                        $users = $userRepo->findBy(array("nickname" => $nickname));

                        if (count($users) == 1) {
                            $user = $users[0];
                            $openings = $openingRepo->findBy(array("user" => $user->id));
                        }
                    } else {
                        $openings = $openingRepo->findBy(
                            array("description" => $search)
                        );
                    }
                } else {
                    $openings = $openingRepo->findAll();
                }

                // use Entity\Opening;
                // use Entity\User;
                // $user1 = new User();
                // $user1->id = 1;
                // $user1->nickname = "haruka";
                // $user1->password = "xxxxxxxx";

                // $opening1 = new Opening();
                // $opening1->id = 1;
                // $opening1->anime = "Naruto";
                // $opening1->song = " Seishun Kyousoukyoku";
                // $opening1->group = "Sambomaster";
                // $opening1->description = "Ma vie cette chanson !!";
                // $opening1->url_song = "https://www.youtube.com/watch?v=lilv4MvBY6E";
                // $opening1->picture = "https://schizoidmouse.files.wordpress.com/2017/05/hqdefault-2.jpg";
                // $opening1->user = $user1;

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
                  <script src="https://kit.fontawesome.com/5bb1d77498.js" crossorigin="anonymous"></script>

              </head>

              <body>

                  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
                      <div class="container">
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
                                  <!-- <li class="nav-item">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Sign up</button>
                    </li> -->

                              </ul>
                              <ul class="ml-auto">
                                  <form method="get" class="form-inline my-lg-0">
                                      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                                  </form>
                              </ul>
                          </div>
                  </nav>
                  </div>
                  <!-- *************************HEADER********************************* -->
                  <header id="image">

                      <!-- <h1>Retrouvez vos meilleurs Openings d'anime !</h1> -->

                  </header>

                  <!-- *********************************************************************** -->

                  <article id="topWeek">

                      <p> <i class="fas fa-music"></i> PLAYLIST </p>
                      <h2>
                          <strong> Retrouvez le top de la semaine</strong>
                      </h2>
                  </article>

                  <div class="container mt-4">
                      <div class="row">

                          <?php
                            foreach ($openings as $opening) { ?>
                              <div class="card col-lg-5 my-4 mx-4 shadow-sm">
                                  <h5 class="my-1 font-weight-normal"><em> <a href="?search=@<?php echo $opening->user->nickname ?>">@_<?php echo $opening->user->nickname ?></a> </em></h5>
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