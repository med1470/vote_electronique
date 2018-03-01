<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Encryptedvote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Encryptedvote controller.
 *
 * @Route("encryptedvote")
 */
class EncryptedvoteController extends Controller
{
    /**
     * Lists all encryptedvote entities.
     *
     * @Route("/", name="encryptedvote_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $encryptedvotes = $em->getRepository('AppBundle:Encryptedvote')->findAll();

        return $this->render('encryptedvote/index.html.twig', array(
            'encryptedvotes' => $encryptedvotes,
        ));
    }

    /**
     * Creates a new encryptedvote entity.
     *
     * @Route("/new", name="encryptedvote_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $encryptedvote = new Encryptedvote();
        $form = $this->createForm('AppBundle\Form\EncryptedvoteType', $encryptedvote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($encryptedvote);
            $em->flush();

            return $this->redirectToRoute('encryptedvote_show', array('id' => $encryptedvote->getId()));
        }

        return $this->render('encryptedvote/new.html.twig', array(
            'encryptedvote' => $encryptedvote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a encryptedvote entity.
     *
     * @Route("/{id}", name="encryptedvote_show")
     * @Method("GET")
     */
    public function showAction(Encryptedvote $encryptedvote)
    {
        $deleteForm = $this->createDeleteForm($encryptedvote);

        return $this->render('encryptedvote/show.html.twig', array(
            'encryptedvote' => $encryptedvote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing encryptedvote entity.
     *
     * @Route("/{id}/edit", name="encryptedvote_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Encryptedvote $encryptedvote)
    {
        $deleteForm = $this->createDeleteForm($encryptedvote);
        $editForm = $this->createForm('AppBundle\Form\EncryptedvoteType', $encryptedvote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('encryptedvote_edit', array('id' => $encryptedvote->getId()));
        }

        return $this->render('encryptedvote/edit.html.twig', array(
            'encryptedvote' => $encryptedvote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a encryptedvote entity.
     *
     * @Route("/{id}", name="encryptedvote_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Encryptedvote $encryptedvote)
    {
        $form = $this->createDeleteForm($encryptedvote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($encryptedvote);
            $em->flush();
        }

        return $this->redirectToRoute('encryptedvote_index');
    }

    /**
     * Creates a form to delete a encryptedvote entity.
     *
     * @param Encryptedvote $encryptedvote The encryptedvote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Encryptedvote $encryptedvote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('encryptedvote_delete', array('id' => $encryptedvote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
