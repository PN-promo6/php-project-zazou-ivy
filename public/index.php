<?php

require __DIR__ . '/../vendor/autoload.php';
session_start();

use Entity\User;
use Entity\Opening;
use ludk\Persistence\ORM;
use Controller\AuthController;
use Controller\HomeController;
use Controller\OpeningController;

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
        $controller = new AuthController;
        $controller->register();
        break;
        //   ==========================================logout======================================                      
    case 'logout':
        $controller = new AuthController;
        $controller->logout();
        break;
        //   ==========================================login======================================                      
    case 'login':
        $controller = new AuthController;
        $controller->login();
        break;
        //   ==========================================new======================================                      
    case 'new':
        $controller = new OpeningController;
        $controller->create();
        break;
    case 'display':
    default:
        // $ope = $openingRepo->find(1);
        // $ope->description = "new description !";
        // $manager->persist($ope);
        // $manager->flush;
        $controller = new HomeController;
        $controller->display();
        break;
}
