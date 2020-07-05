<?php

namespace Controller;

use display;
use Entity\User;
use Entity\Opening;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function display(Request $request): Response
    {
        $openingRepo = $this->getOrm()->getRepository(Opening::class);
        $userRepo = $this->getOrm()->getRepository(User::class);
        $orm = $this->getOrm();
        $openings = array();
        if ($request->query->has('search')) {
            $search = $request->query->get('search');
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
                    array("anime" => "%$search%")
                );
            }
        } else {
            $openings = $openingRepo->findAll();
        }
        $data = array(
            "openings" => $openings
        );
        return $this->render('display.php', $data);
    }
}
