<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\CoursPlanning;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Coursplanning controller.
 *
 * @Route("coursplanning")
 */
class CoursPlanningController extends Controller
{
    /**
     * Lists all coursPlanning entities.
     *
     * @Route("/", name="coursplanning_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coursPlannings = $em->getRepository('BlogBundle:CoursPlanning')->findAll();

        return $this->render('coursplanning/index.html.twig', array(
            'coursPlannings' => $coursPlannings,
        ));
    }

    /**
     * Creates a new coursPlanning entity.
     *
     * @Route("/new", name="coursplanning_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $coursPlanning = new Coursplanning();
        $form = $this->createForm('BlogBundle\Form\CoursPlanningType', $coursPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coursPlanning);
            $em->flush();

            return $this->redirectToRoute('coursplanning_show', array('id' => $coursPlanning->getId()));
        }

        return $this->render('coursplanning/new.html.twig', array(
            'coursPlanning' => $coursPlanning,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coursPlanning entity.
     *
     * @Route("/{id}", name="coursplanning_show")
     * @Method("GET")
     */
    public function showAction(CoursPlanning $coursPlanning)
    {
        $deleteForm = $this->createDeleteForm($coursPlanning);

        return $this->render('coursplanning/show.html.twig', array(
            'coursPlanning' => $coursPlanning,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coursPlanning entity.
     *
     * @Route("/{id}/edit", name="coursplanning_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CoursPlanning $coursPlanning)
    {
        $deleteForm = $this->createDeleteForm($coursPlanning);
        $editForm = $this->createForm('BlogBundle\Form\CoursPlanningType', $coursPlanning);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coursplanning_edit', array('id' => $coursPlanning->getId()));
        }

        return $this->render('coursplanning/edit.html.twig', array(
            'coursPlanning' => $coursPlanning,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coursPlanning entity.
     *
     * @Route("/{id}", name="coursplanning_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CoursPlanning $coursPlanning)
    {
        $form = $this->createDeleteForm($coursPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coursPlanning);
            $em->flush();
        }

        return $this->redirectToRoute('coursplanning_index');
    }

    /**
     * Creates a form to delete a coursPlanning entity.
     *
     * @param CoursPlanning $coursPlanning The coursPlanning entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CoursPlanning $coursPlanning)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('coursplanning_delete', array('id' => $coursPlanning->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
