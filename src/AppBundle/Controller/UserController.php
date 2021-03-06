<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;

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
    public function userAction($idUser, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')->find($idUser);

        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updateUser($user);

            
            //message d'info pour l'ajout du sport
            $this->addFlash(
                'notice',
                'Adresse email modifiée !'
            );

        }

        return $this->render('FOSUserBundle:Profile:edit.html.twig', array(
            "user" => $user,
            "idUser" => $idUser,
            'form' => $form->createView()
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
