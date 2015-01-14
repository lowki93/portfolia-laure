<?php

namespace Portfolio\LaureBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PortfolioLaureBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
