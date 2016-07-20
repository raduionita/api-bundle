<?php

namespace Raducorp\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RaducorpApiBundle:Default:index.html.twig');
    }
}
