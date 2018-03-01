<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Decryptedvote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Decryptedvote controller.
 *
 * @Route("decryptedvote")
 */
class DecryptedvoteController extends Controller
{
    /**
     * Lists all decryptedvote entities.
     *
     * @Route("/", name="decryptedvote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $decryptedvotes = $em->getRepository('AppBundle:Decryptedvote')->findAll();

        return $this->render('decryptedvote/index.html.twig', array(
            'decryptedvotes' => $decryptedvotes,
        ));
    }

    /**
     * Creates a new decryptedvote entity.
     *
     * @Route("/new", name="decryptedvote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $decryptedvote = new Decryptedvote();
        $form = $this->createForm('AppBundle\Form\DecryptedvoteType', $decryptedvote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($decryptedvote);
            $em->flush();

            return $this->redirectToRoute('decryptedvote_show', array('id' => $decryptedvote->getId()));
        }

        return $this->render('decryptedvote/new.html.twig', array(
            'decryptedvote' => $decryptedvote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a decryptedvote entity.
     *
     * @Route("/{id}", name="decryptedvote_show")
     * @Method("GET")
     */
    public function showAction(Decryptedvote $decryptedvote)
    {
        $deleteForm = $this->createDeleteForm($decryptedvote);

        return $this->render('decryptedvote/show.html.twig', array(
            'decryptedvote' => $decryptedvote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing decryptedvote entity.
     *
     * @Route("/{id}/edit", name="decryptedvote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Decryptedvote $decryptedvote)
    {
        $deleteForm = $this->createDeleteForm($decryptedvote);
        $editForm = $this->createForm('AppBundle\Form\DecryptedvoteType', $decryptedvote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decryptedvote_edit', array('id' => $decryptedvote->getId()));
        }

        return $this->render('decryptedvote/edit.html.twig', array(
            'decryptedvote' => $decryptedvote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a decryptedvote entity.
     *
     * @Route("/{id}", name="decryptedvote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Decryptedvote $decryptedvote)
    {
        $form = $this->createDeleteForm($decryptedvote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($decryptedvote);
            $em->flush();
        }

        return $this->redirectToRoute('decryptedvote_index');
    }

    /**
     * Creates a form to delete a decryptedvote entity.
     *
     * @param Decryptedvote $decryptedvote The decryptedvote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Decryptedvote $decryptedvote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('decryptedvote_delete', array('id' => $decryptedvote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
