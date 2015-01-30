<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $aboutIntro = $em->getRepository('PortfolioLaureBundle:AboutIntro')->findAll();
        $aboutFeelings = $em->getRepository('PortfolioLaureBundle:AboutFeeling')->findBy(
            array(),
            array('createdAt' => 'ASC')
        );

        return $this->render('PortfolioLaureBundle:About:index.html.twig',
            array(
                'aboutIntro' => $aboutIntro[0],
                'aboutFeelings' => $aboutFeelings
            ));
    }
} 