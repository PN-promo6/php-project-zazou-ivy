<?php

namespace Controller;

use Entity\Opening;

class OpeningController
{

    public function create()
    {
        global $manager;
        if (isset($_POST['anime']) && isset($_POST['song']) && isset($_POST['group']) && isset($_POST['description']) && isset($_POST['url_song']) && isset($_POST['picture']) && isset($_SESSION['user'])) {
            $errorMsg = NULL;
            $newOpening = new Opening();
            $newOpening->anime = $_POST['anime'];
            $newOpening->song = $_POST['song'];
            $newOpening->group = $_POST['group'];
            $newOpening->description = $_POST['description'];
            $newOpening->url_song = $_POST['url_song'];
            $newOpening->picture = $_POST['picture'];
            $newOpening->user = $_SESSION['user'];
            $manager->persist($newOpening);
            $manager->flush();
            header('Location:/?action=display');
        } else {
            $errorMsg = "Tous les champs n'ont pas étés remplis. Merci de remplir tous les champs";
        }
    }
}
