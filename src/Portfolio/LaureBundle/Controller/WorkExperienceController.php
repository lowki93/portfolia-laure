<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\workExperience;
use Portfolio\LaureBundle\Form\workExperienceType;

/**
 * workExperience controller.
 *
 */
class WorkExperienceController extends Controller
{

    /**
     * Lists all workExperience entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:workExperience')->findAll();

        return $this->render('PortfolioLaureBundle:workExperience:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        $workExperiences = $em->getRepository('PortfolioLaureBundle:workExperience')->findBy(
            array(),
            array('createdAt' => 'DESC')
        );

        $arrayDate = [];
        foreach($workExperiences as $experience){
            $arrayDate[$experience->getYear()][] = $experience;
        }

        return $this->render('PortfolioLaureBundle:WorkExperience:show.html.twig', array(
            'workExperiences' => $arrayDate
        ));
    }

    /**
     * Creates a new workExperience entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new workExperience();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('workexperience'));
        }

        return $this->render('PortfolioLaureBundle:workExperience:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a workExperience entity.
     *
     * @param workExperience $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(workExperience $entity)
    {
        $form = $this->createForm(new workExperienceType(), $entity, array(
            'action' => $this->generateUrl('workexperience_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new workExperience entity.
     *
     */
    public function newAction()
    {
        $entity = new workExperience();
        $form   = $this->createCreateForm($entity);

        return $this->render('PortfolioLaureBundle:workExperience:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing workExperience entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:workExperience')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find workExperience entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PortfolioLaureBundle:workExperience:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a workExperience entity.
    *
    * @param workExperience $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(workExperience $entity)
    {
        $form = $this->createForm(new workExperienceType(), $entity, array(
            'action' => $this->generateUrl('workexperience_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing workExperience entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:workExperience')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find workExperience entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->preUpload();
            $em->flush();

            return $this->redirect($this->generateUrl('workexperience'));
        }

        return $this->render('PortfolioLaureBundle:workExperience:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a workExperience entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PortfolioLaureBundle:workExperience')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find workExperience entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('workexperience'));
    }

    /**
     * Creates a form to delete a workExperience entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('workexperience_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
