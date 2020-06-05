<?php

namespace Controller;

use display;
use Entity\Opening;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class OpeningController extends AbstractController
{

    public function create(Request $request): Response
    {
        $manager = $this->getOrm()->getManager();
        if ($request->request->has("anime") && $request->request->has("song") && $request->request->has("group") && $request->request->has("description") && $request->request->has("url_song") && $request->request->has("picture") && $request->getSession()->has('user')) {
            $newOpening = new Opening();
            $newOpening->anime = $request->request->get("anime");
            $newOpening->song = $request->request->get("song");
            $newOpening->group = $request->request->get("group");
            $newOpening->description = $request->request->get("description");
            $newOpening->url_song = $request->request->get("url_song");
            $newOpening->picture = $request->request->get("picture");
            $newOpening->user = $request->getSession()->get('user');
            $manager->persist($newOpening);
            $manager->flush();
            return $this->redirectToRoute('display');
        } else {
            $data = array(
                "openings" => $this->getOrm()->getRepository(Opening::class)->findAll(),
                "errorMsg" => "Tous les champs n'ont pas étés remplis. Merci de remplir tous les champs"
            );
            return $this->render("display.php", $data);
        }
    }
}
