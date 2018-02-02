<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Eleves;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Eleve controller.
 *
 * @Route("eleves")
 */
class ElevesController extends Controller
{
    /**
     * Lists all eleve entities.
     *
     * @Route("/", name="eleves_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eleves = $em->getRepository('BlogBundle:Eleves')->findAll();

        return $this->render('eleves/index.html.twig', array(
            'eleves' => $eleves,
        ));
    }

    /**
     * Creates a new eleve entity.
     *
     * @Route("/new", name="eleves_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $eleve = new Eleves();
        $form = $this->createForm('BlogBundle\Form\ElevesType', $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eleve);
            $em->flush();

            return $this->redirectToRoute('eleves_show', array('id' => $eleve->getId()));
        }

        return $this->render('eleves/new.html.twig', array(
            'eleve' => $eleve,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a eleve entity.
     *
     * @Route("/{id}", name="eleves_show")
     * @Method("GET")
     */
    public function showAction(Eleves $eleve)
    {
        $deleteForm = $this->createDeleteForm($eleve);

        return $this->render('eleves/show.html.twig', array(
            'eleve' => $eleve,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing eleve entity.
     *
     * @Route("/{id}/edit", name="eleves_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Eleves $eleve)
    {
        $deleteForm = $this->createDeleteForm($eleve);
        $editForm = $this->createForm('BlogBundle\Form\ElevesType', $eleve);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eleves_edit', array('id' => $eleve->getId()));
        }

        return $this->render('eleves/edit.html.twig', array(
            'eleve' => $eleve,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a eleve entity.
     *
     * @Route("/{id}", name="eleves_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Eleves $eleve)
    {
        $form = $this->createDeleteForm($eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eleve);
            $em->flush();
        }

        return $this->redirectToRoute('eleves_index');
    }

    /**
     * Creates a form to delete a eleve entity.
     *
     * @param Eleves $eleve The eleve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Eleves $eleve)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eleves_delete', array('id' => $eleve->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
