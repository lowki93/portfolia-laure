<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IllustrationController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioLaureBundle:Illustration:index.html.twig');
    }
} 