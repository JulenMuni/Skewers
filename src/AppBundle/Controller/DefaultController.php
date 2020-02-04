<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $skewers = [];
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Skewer');
// $poemas = $repo->findAll();

        return $this->render('default/index.html.twig', [
                    'skewers' => $skewers
        ]);
       
    }

}
