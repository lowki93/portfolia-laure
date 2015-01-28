<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Portfolio\LaureBundle\Entity\SocialNetwork;
use Portfolio\LaureBundle\Form\SocialNetworkType;

/**
 * SocialNetwork controller.
 *
 */
class SocialNetworkController extends Controller
{
    public function getSocialNetworkAction($socialNetworkString)
    {
        $em = $this->getDoctrine()->getManager();

        $socialNetwork = $em->getRepository('PortfolioLaureBundle:SocialNetwork')->findOneBy(
            array(
                'socialNetwork' => $socialNetworkString
            )
        );

        return $this->render('PortfolioLaureBundle:SocialNetwork:show.html.twig', array(
            'socialNetwork' => $socialNetwork,
        ));
    }
    /**
     * Lists all SocialNetwork entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:SocialNetwork')->findAll();

        return $this->render('PortfolioLaureBundle:SocialNetwork:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Displays a form to edit an existing SocialNetwork entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('PortfolioLaureBundle:SocialNetwork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SocialNetwork entity.
    *
    * @param SocialNetwork $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SocialNetwork $entity)
    {
        $form = $this->createForm(new SocialNetworkType(), $entity, array(
            'action' => $this->generateUrl('socialnetwork_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SocialNetwork entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:SocialNetwork')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialNetwork entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('socialnetwork'));
        }

        return $this->render('PortfolioLaureBundle:SocialNetwork:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
}
