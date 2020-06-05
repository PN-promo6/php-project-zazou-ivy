<?php

namespace Controller;

use Entity\User;

class HomeController
{
    public function display()
    {
        global $openingRepo;
        global $userRepo;
        global $orm;
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
    }
}
