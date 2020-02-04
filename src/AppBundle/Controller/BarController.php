<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Bar controller.
 *
 * @Route("bar")
 */
class BarController extends Controller
{
    /**
     * Lists all bar entities.
     *
     * @Route("/", name="bar_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bars = $em->getRepository('AppBundle:Bar')->findAll();

        return $this->render('bar/index.html.twig', array(
            'bars' => $bars,
        ));
    }

    /**
     * Finds and displays a bar entity.
     *
     * @Route("/{id}", name="bar_show")
     * @Method("GET")
     */
    public function showAction(Bar $bar)
    {

        return $this->render('bar/show.html.twig', array(
            'bar' => $bar,
        ));
    }
}
