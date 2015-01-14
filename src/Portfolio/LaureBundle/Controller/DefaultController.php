<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PortfolioLaureBundle:Default:index.html.twig');
    }

    public function adminAction()
    {
        return $this->render('PortfolioLaureBundle:Admin:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('PortfolioLaureBundle:Default:contact.html.twig');
    }
}
