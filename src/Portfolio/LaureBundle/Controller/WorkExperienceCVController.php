<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Portfolio\LaureBundle\Entity\WorkExperienceCV;
use Portfolio\LaureBundle\Form\WorkExperienceCVType;
use Symfony\Component\HttpFoundation\Response;

/**
 * WorkExperienceCV controller.
 *
 */
class WorkExperienceCVController extends Controller
{

    public function downloadCVAction()
    {

        $em = $this->getDoctrine()->getManager();
        $cv = $em->getRepository("PortfolioLaureBundle:WorkExperienceCV")->findAll();
        $filename = $cv[0]->getPath();
        $fileLocation = $cv[0]->getUploadDir().'/';
        $response = new Response();

        $response->setContent(file_get_contents($fileLocation . $filename));
        $response->headers->set(
            'Content-Type',
            'application/pdf'
        );
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($filename) . '";');
        $response->send();

        return $response;
    }

    /**
     * Lists all WorkExperienceCV entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortfolioLaureBundle:WorkExperienceCV')->findAll();

        return $this->render('PortfolioLaureBundle:WorkExperienceCV:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Displays a form to edit an existing WorkExperienceCV entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:WorkExperienceCV')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkExperienceCV entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('PortfolioLaureBundle:WorkExperienceCV:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a WorkExperienceCV entity.
    *
    * @param WorkExperienceCV $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(WorkExperienceCV $entity)
    {
        $form = $this->createForm(new WorkExperienceCVType(), $entity, array(
            'action' => $this->generateUrl('workexperiencecv_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing WorkExperienceCV entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortfolioLaureBundle:WorkExperienceCV')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find WorkExperienceCV entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->preUpload();
            $em->flush();

            return $this->redirect($this->generateUrl('workexperience'));
        }

        return $this->render('PortfolioLaureBundle:WorkExperienceCV:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

}
