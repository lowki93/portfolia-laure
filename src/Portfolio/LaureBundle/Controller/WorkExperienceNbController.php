<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\WorkExperienceNb;
use Portfolio\LaureBundle\Form\WorkExperienceNbType;

/**
 * WorkExperienceNb controller.
 *
 */
class WorkExperienceNbController extends Controller
{

    /**
     * Lists all WorkExperienceNb entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:WorkExperienceNb')->findAll();

        return $this->render('PortfolioLaureBundle:WorkExperienceNb:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Displays a form to edit an existing WorkExperienceNb entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:WorkExperienceNb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkExperienceNb entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('PortfolioLaureBundle:WorkExperienceNb:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a WorkExperienceNb entity.
    *
    * @param WorkExperienceNb $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(WorkExperienceNb $entity)
    {
        $form = $this->createForm(new WorkExperienceNbType(), $entity, array(
            'action' => $this->generateUrl('workexperiencenb_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing WorkExperienceNb entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:WorkExperienceNb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkExperienceNb entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('workexperience'));
        }

        return $this->render('PortfolioLaureBundle:WorkExperienceNb:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
}
