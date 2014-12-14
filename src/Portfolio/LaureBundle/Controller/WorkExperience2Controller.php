<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorkExperience2Controller extends Controller
{
    public function indexAction()
    {
            return $this->render('PortfolioLaureBundle:WorkExperience2:index.html.twig');
    }
} 