<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Resultballot;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Resultballot controller.
 *
 * @Route("resultballot")
 */
class ResultballotController extends Controller
{
    /**
     * Lists all resultballot entities.
     *
     * @Route("/", name="resultballot_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultballots = $em->getRepository('AppBundle:Resultballot')->findAll();

        return $this->render('resultballot/index.html.twig', array(
            'resultballots' => $resultballots,
        ));
    }

    /**
     * Creates a new resultballot entity.
     *
     * @Route("/new", name="resultballot_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resultballot = new Resultballot();
        $form = $this->createForm('AppBundle\Form\ResultballotType', $resultballot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultballot);
            $em->flush();

            return $this->redirectToRoute('resultballot_show', array('id' => $resultballot->getId()));
        }

        return $this->render('resultballot/new.html.twig', array(
            'resultballot' => $resultballot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultballot entity.
     *
     * @Route("/{id}", name="resultballot_show")
     * @Method("GET")
     */
    public function showAction(Resultballot $resultballot)
    {
        $deleteForm = $this->createDeleteForm($resultballot);

        return $this->render('resultballot/show.html.twig', array(
            'resultballot' => $resultballot,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultballot entity.
     *
     * @Route("/{id}/edit", name="resultballot_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Resultballot $resultballot)
    {
        $deleteForm = $this->createDeleteForm($resultballot);
        $editForm = $this->createForm('AppBundle\Form\ResultballotType', $resultballot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultballot_edit', array('id' => $resultballot->getId()));
        }

        return $this->render('resultballot/edit.html.twig', array(
            'resultballot' => $resultballot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultballot entity.
     *
     * @Route("/{id}", name="resultballot_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Resultballot $resultballot)
    {
        $form = $this->createDeleteForm($resultballot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultballot);
            $em->flush();
        }

        return $this->redirectToRoute('resultballot_index');
    }

    /**
     * Creates a form to delete a resultballot entity.
     *
     * @param Resultballot $resultballot The resultballot entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Resultballot $resultballot)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultballot_delete', array('id' => $resultballot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
