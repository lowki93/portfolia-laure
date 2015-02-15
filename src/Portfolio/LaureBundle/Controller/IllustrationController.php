<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\Illustration;
use Portfolio\LaureBundle\Form\IllustrationType;

/**
 * Illustration controller.
 *
 */
class IllustrationController extends Controller
{

    public function carouselAction()
    {
        $em = $this->getDoctrine()->getManager();

        $illustrations = $em->getRepository('PortfolioLaureBundle:Illustration')->findAll();

        return $this->render('PortfolioLaureBundle:Illustration:carousel.html.twig', array(
            'illustrations' => $illustrations
        ));
    }
    /**
     * Lists all Illustration entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:Illustration')->findAll();

        return $this->render('PortfolioLaureBundle:Illustration:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Illustration entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Illustration();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('illustration'));
        }

        return $this->render('PortfolioLaureBundle:Illustration:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Illustration entity.
     *
     * @param Illustration $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Illustration $entity)
    {
        $form = $this->createForm(new IllustrationType(), $entity, array(
            'action' => $this->generateUrl('illustration_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Illustration entity.
     *
     */
    public function newAction()
    {
        $entity = new Illustration();
        $form   = $this->createCreateForm($entity);

        return $this->render('PortfolioLaureBundle:Illustration:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Illustration entity.
     *
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        $illustrations = $em->getRepository('PortfolioLaureBundle:Illustration')->findAll();

        if (!$illustrations) {
            throw $this->createNotFoundException('Unable to find Illustration entity.');
        }

        return $this->render('PortfolioLaureBundle:Illustration:show.html.twig', array(
            'illustrations'      => $illustrations,
        ));
    }

    /**
     * Displays a form to edit an existing Illustration entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:Illustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Illustration entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PortfolioLaureBundle:Illustration:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Illustration entity.
    *
    * @param Illustration $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Illustration $entity)
    {
        $form = $this->createForm(new IllustrationType(), $entity, array(
            'action' => $this->generateUrl('illustration_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Illustration entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:Illustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Illustration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('illustration_edit', array('id' => $id)));
        }

        return $this->render('PortfolioLaureBundle:Illustration:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Illustration entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PortfolioLaureBundle:Illustration')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Illustration entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('illustration'));
    }

    /**
     * Creates a form to delete a Illustration entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('illustration_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
