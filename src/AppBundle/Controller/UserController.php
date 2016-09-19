<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller{
    /**
     * @Route("/user/")
     */
    public function userHomePage(){
        return $this->render('user/user.html.twig', array());
    }

    /**
     * @Route("/user/sign_in/")
     */
    public function userSignIn(){
        return $this->render('user/signIn.html.twig', array());
    }

    /**
     * @Route("/user/sign_up/")
     */
    public function userSignUp(){
        return $this->render('user/signUp.html.twig', array());
    }
}