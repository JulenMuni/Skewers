<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skewer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Skewer controller.
 *
 * @Route("skewer")
 */
class SkewerController extends Controller
{
    /**
     * Lists all skewer entities.
     *
     * @Route("/", name="skewer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $skewers = $em->getRepository('AppBundle:Skewer')->findAll();

        return $this->render('skewer/index.html.twig', array(
            'skewers' => $skewers,
        ));
    }

    /**
     * Finds and displays a skewer entity.
     *
     * @Route("/{id}", name="skewer_show")
     * @Method("GET")
     */
    public function showAction(Skewer $skewer)
    {

        return $this->render('skewer/show.html.twig', array(
            'skewer' => $skewer,
        ));
    }
}
