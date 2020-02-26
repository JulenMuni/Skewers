<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Skewer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
     * Creates a new skewer entity.
     *
     * @Route("/new", name="skewer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $skewer = new Skewer();
        $form = $this->createForm('AppBundle\Form\SkewerType', $skewer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skewer);
            $em->flush();

            return $this->redirectToRoute('skewer_show', array('id' => $skewer->getId()));
        }

        return $this->render('skewer/new.html.twig', array(
            'skewer' => $skewer,
            'form' => $form->createView(),
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
        $deleteForm = $this->createDeleteForm($skewer);

        return $this->render('skewer/show.html.twig', array(
            'skewer' => $skewer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing skewer entity.
     *
     * @Route("/{id}/edit", name="skewer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Skewer $skewer)
    {
        $deleteForm = $this->createDeleteForm($skewer);
        $editForm = $this->createForm('AppBundle\Form\SkewerType', $skewer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('skewer_edit', array('id' => $skewer->getId()));
        }

        return $this->render('skewer/edit.html.twig', array(
            'skewer' => $skewer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a skewer entity.
     *
     * @Route("/{id}", name="skewer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Skewer $skewer)
    {
        $form = $this->createDeleteForm($skewer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($skewer);
            $em->flush();
        }

        return $this->redirectToRoute('skewer_index');
    }

    /**
     * Creates a form to delete a skewer entity.
     *
     * @param Skewer $skewer The skewer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Skewer $skewer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('skewer_delete', array('id' => $skewer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
