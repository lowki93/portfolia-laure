<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorkExperienceController extends Controller
{
    public function indexAction()
    {
            return $this->render('PortfolioLaureBundle:WorkExperience:index.html.twig');
    }
} 