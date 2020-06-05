<?php

namespace Controller;

use display;
use Entity\User;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{

    public function login(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        if ($request->request->has("username") && $request->request->has("password")) {
            $usersWithThisLogin = $userRepo->findBy(array("nickname" => $request->request->get("username")));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != ($request->request->get("password"))) {
                    return $this->render("loginForm.php", array("errorMsg" => "Wrong password"));
                } else {
                    // $_SESSION['user'] = $usersWithThisLogin[0];
                    $request->getSession()->set('user', $usersWithThisLogin[0]);
                    return $this->redirectToRoute('display');
                }
            } else {
                return $this->render("loginForm.php", array("errorMsg" => "Nickname doesn't exist."));
            }
        } else {
            return $this->render("loginForm.php");
        }
    }

    public function logout(Request $request): Response
    {
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute('display');
    }

    public function register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();

        if ($request->request->has("username") && $request->request->has("password") && $request->request->has("passwordRetype")) {
            $error = NULL;
            $users = $userRepo->findBy(array("nickname" => $request->request->get("username")));

            if (count($users) > 0) {
                $error = "Nickname already used.";
            } else if ($request->request->get("password") != $request->request->get("passwordRetype")) {
                $error = "Passwords are not the same.";
            } else if (strlen(trim($request->request->get("password"))) < 8) {
                $error = "Your password should have at least 8 characters.";
            } else if (strlen(trim($request->request->get("username"))) < 4) {
                $error = "Your nickame should have at least 4 characters.";
            }
            if ($error) {
                $data = array(
                    "errorMsg" => $error
                );
                return $this->render('registerForm.php', $data);
            } else {
                $user = new User();
                $user->nickname = $request->request->get("username");
                $user->password = $request->request->get("password");
                $manager->persist($user);
                $manager->flush();
                $request->getSession()->set('user', $user);
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render('registerForm.php');
        }
    }
}
