<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/userTest")
     */
    public function indexAction()
    {
        return $this->render('user/index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/signIn")
     */
    public function signInAction()
    {
        return $this->render('user/sign_in.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/signUp")
     */
    public function signUpAction()
    {
        return $this->render('user/sign_up.html.twig', array(
            // ...
        ));
    }

}
