<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("userTest")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:User:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/signIn")
     */
    public function signInAction()
    {
        return $this->render('AppBundle:User:sign_in.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/signUp")
     */
    public function signUpAction()
    {
        return $this->render('AppBundle:User:sign_up.html.twig', array(
            // ...
        ));
    }

}
