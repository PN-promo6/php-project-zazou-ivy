              <?php

                require __DIR__ . '/../vendor/autoload.php';
                session_start();

                use Entity\Opening;
                use Entity\User;
                use ludk\Persistence\ORM;

                $orm = new ORM(__DIR__ . '/../Resources');
                $manager = $orm->getManager();
                $openingRepo = $orm->getRepository(Opening::class);
                $userRepo = $orm->getRepository(User::class);

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

                $action = $_GET["action"] ?? "display";
                switch ($action) {

                        //   ==========================================register======================================                      

                    case 'register':
                        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
                            $errorMsg = NULL;
                            $users = $userRepo->findBy(array("nickname" => $_POST['username']));

                            if (count($users) > 0) {
                                $errorMsg = "Nickname already used.";
                            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                                $errorMsg = "Passwords are not the same.";
                            } else if (strlen(trim($_POST['password'])) < 8) {
                                $errorMsg = "Your password should have at least 8 characters.";
                            } else if (strlen(trim($_POST['username'])) < 4) {
                                $errorMsg = "Your nickame should have at least 4 characters.";
                            }
                            if ($errorMsg) {
                                include "../templates/registerForm.php";
                            } else {
                                // $userId = CreateNewUser($_POST['username'], $_POST['password']);
                                $user = new User();
                                $user->nickname = $_POST['username'];
                                $user->password = $_POST['password'];
                                $user->contact = "";
                                $manager->persist($user);
                                $manager->flush();
                                $_SESSION['user'] = $user;
                                header('Location: ?action=display');
                            }
                        } else {
                            include "../templates/registerForm.php";
                        }
                        break;
                        //   ==========================================logout======================================                      
                    case 'logout':
                        if (isset($_SESSION['user'])) {
                            unset($_SESSION['user']);
                        }
                        header('Location: /?action=display');
                        break;
                        //   ==========================================login======================================                      
                    case 'login':
                        if (isset($_POST['username']) && isset($_POST['password'])) {
                            $usersWithThisLogin = $userRepo->findBy(array("nickname" => $_POST['username']));
                            if (count($usersWithThisLogin) == 1) {
                                $firstUserWithThisLogin = $usersWithThisLogin[0];
                                if ($firstUserWithThisLogin->password != ($_POST['password'])) {
                                    $errorMsg = "Wrong password.";
                                    include "../templates/loginForm.php";
                                } else {
                                    $_SESSION['user'] = $usersWithThisLogin[0];
                                    header('Location:/?action=display');
                                }
                            } else {
                                $errorMsg = "Nickname doesn't exist.";
                                include "../templates/loginForm.php";
                            }
                        } else {
                            include "../templates/loginForm.php";
                        }
                        break;
                        //   ==========================================new======================================                      
                    case 'new':

                        break;
                    case 'display':
                    default:
                        // $ope = $openingRepo->find(1);
                        // $ope->description = "new description !";
                        // $manager->persist($ope);
                        // $manager->flush;
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
                        include "../templates/display.php";
                        break;
                }
                ?>
