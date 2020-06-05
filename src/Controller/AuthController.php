<?php

namespace Controller;

use Entity\User;

class AuthController
{

    public function login()
    {
        global $userRepo;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersWithThisLogin = $userRepo->findBy(array("nickname" => $_POST['username']));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != ($_POST['password'])) {
                    $errorMsg = "Wrong password.";
                    include "../templates/loginForm.php";
                } else {
                    $_SESSION['user'] = $usersWithThisLogin[0];
                    header('Location:/display');
                }
            } else {
                $errorMsg = "Nickname doesn't exist.";
                include "../templates/loginForm.php";
            }
        } else {
            include "../templates/loginForm.php";
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: /display');
    }

    public function register()
    {
        global $userRepo;
        global $manager;

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
                // $user->contact = "";
                $manager->persist($user);
                $manager->flush();
                $_SESSION['user'] = $user;
                header('Location: /display');
            }
        } else {
            include "../templates/registerForm.php";
        }
    }
}
