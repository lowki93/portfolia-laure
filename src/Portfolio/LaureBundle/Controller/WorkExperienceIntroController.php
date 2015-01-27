<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\WorkExperienceIntro;
use Portfolio\LaureBundle\Form\WorkExperienceIntroType;

/**
 * WorkExperienceIntro controller.
 *
 */
class WorkExperienceIntroController extends Controller
{

    /**
     * Lists all WorkExperienceIntro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:WorkExperienceIntro')->findAll();

        return $this->render('PortfolioLaureBundle:WorkExperienceIntro:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Displays a form to edit an existing WorkExperienceIntro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:WorkExperienceIntro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkExperienceIntro entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('PortfolioLaureBundle:WorkExperienceIntro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

    /**
    * Creates a form to edit a WorkExperienceIntro entity.
    *
    * @param WorkExperienceIntro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(WorkExperienceIntro $entity)
    {
        $form = $this->createForm(new WorkExperienceIntroType(), $entity, array(
            'action' => $this->generateUrl('workexperienceintro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing WorkExperienceIntro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:WorkExperienceIntro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkExperienceIntro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('workexperience'));
        }

        return $this->render('PortfolioLaureBundle:WorkExperienceIntro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

}
