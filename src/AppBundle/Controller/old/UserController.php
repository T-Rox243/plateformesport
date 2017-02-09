<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Entity\Benevole;
use AppBundle\Entity\Evenement;
use AppBundle\Entity\Club;
use AppBundle\Entity\Sport;
use AppBundle\Entity\Media;
use AppBundle\Entity\Adresse;

class UserController extends Controller
{
    /**
     * @Route("/user/{idUser}", requirements={"idUser" = "\d+"}, name="infoUser")
     */
    public function userAction($idUser)
    {
        return $this->render('user/user.html.twig', array(
            "idUser" => $idUser
        ));
    }

    /**
     * @Route("/destroyUser/{idUser}", requirements={"idUser" = "\d+"}, name="destroyUser")
     */
    public function destroyUserAction($idUser)
    {
        return $this->render('user/destroy_user.html.twig', array(
            "idUser" => $idUser
        ));
    }

    /**
     * @Route("/oldsignIn", name="signInUSer")
     */
    public function signInAction()
    {
        //TODO FORM + VERIFICATION
        return $this->render('user/sign_in.html.twig', array(
        ));
    }

    /**
     * @Route("/oldsignUp", name="signUpUser")
     */
    public function signUpAction()
    {
        //TODO FORM + ENREGISTREMENT BDD
        return $this->render('user/sign_up.html.twig', array(
        ));
    }

    /**
     * @Route("/signOut", name="signOutUser")
     */
    public function signOutAction()
    {
        return $this->render('user/sign_out.html.twig', array(
        ));
    }

}
