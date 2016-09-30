<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FirstController extends Controller
{
    /**
    * @Route("/first")
    */
    public function firstAction()
    {
        return $this->render('First/first.html.twig', array(
            "time" => new \DateTime()
        ));
    }

}
