<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\AboutIntro;
use Portfolio\LaureBundle\Form\AboutIntroType;

/**
 * AboutIntro controller.
 *
 */
class AboutIntroController extends Controller
{

    /**
     * Lists all AboutIntro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:AboutIntro')->findAll();

        return $this->render('PortfolioLaureBundle:AboutIntro:index.html.twig', array(
            'entities' => $entities,
        ));
    }


    /**
     * Displays a form to edit an existing AboutIntro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:AboutIntro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutIntro entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('PortfolioLaureBundle:AboutIntro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

    /**
    * Creates a form to edit a AboutIntro entity.
    *
    * @param AboutIntro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AboutIntro $entity)
    {
        $form = $this->createForm(new AboutIntroType(), $entity, array(
            'action' => $this->generateUrl('aboutintro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AboutIntro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:AboutIntro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutIntro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('aboutintro'));
        }

        return $this->render('PortfolioLaureBundle:AboutIntro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }
}
