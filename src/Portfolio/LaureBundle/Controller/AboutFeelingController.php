<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\AboutFeeling;
use Portfolio\LaureBundle\Form\AboutFeelingType;

/**
 * AboutFeeling controller.
 *
 */
class AboutFeelingController extends Controller
{

    /**
     * Lists all AboutFeeling entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:AboutFeeling')->findAll();

        return $this->render('PortfolioLaureBundle:AboutFeeling:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new AboutFeeling entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new AboutFeeling();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aboutintro'));
        }

        return $this->render('PortfolioLaureBundle:AboutFeeling:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a AboutFeeling entity.
     *
     * @param AboutFeeling $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AboutFeeling $entity)
    {
        $form = $this->createForm(new AboutFeelingType(), $entity, array(
            'action' => $this->generateUrl('aboutfeeling_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AboutFeeling entity.
     *
     */
    public function newAction()
    {
        $entity = new AboutFeeling();
        $form   = $this->createCreateForm($entity);

        return $this->render('PortfolioLaureBundle:AboutFeeling:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AboutFeeling entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:AboutFeeling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutFeeling entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PortfolioLaureBundle:AboutFeeling:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a AboutFeeling entity.
    *
    * @param AboutFeeling $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AboutFeeling $entity)
    {
        $form = $this->createForm(new AboutFeelingType(), $entity, array(
            'action' => $this->generateUrl('aboutfeeling_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AboutFeeling entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:AboutFeeling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AboutFeeling entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('aboutintro'));
        }

        return $this->render('PortfolioLaureBundle:AboutFeeling:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a AboutFeeling entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PortfolioLaureBundle:AboutFeeling')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AboutFeeling entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aboutintro'));
    }

    /**
     * Creates a form to delete a AboutFeeling entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aboutfeeling_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
