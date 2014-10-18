<?php

namespace Portfolio\LaureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortfolioController extends Controller
{

    public function indexAction()
    {
        return $this->render('PortfolioLaureBundle:Portfolio:index.html.twig');
    }

} 