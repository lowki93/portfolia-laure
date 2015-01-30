<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $aboutIntro = $em->getRepository('PortfolioLaureBundle:AboutIntro')->findAll();

        return $this->render('PortfolioLaureBundle:About:index.html.twig',
            array(
                'aboutIntro' => $aboutIntro[0]
            ));
    }
} 