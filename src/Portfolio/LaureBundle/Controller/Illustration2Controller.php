<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Illustration2Controller extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioLaureBundle:Illustration2:index.html.twig');
    }
} 