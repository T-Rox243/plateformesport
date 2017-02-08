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
    public function userAction($idUser, Request $request)
    {
        // On recupere le manager de doctrine
        $em = $this->getDoctrine()->getManager();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');

        // On recupere les informations du club à editer
        $editUser = $em->getRepository('AppBundle:User')->find($idUser);
        // $media = new Media();

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($editUser);
        $form->handleRequest($request);

        var_dump($form);exit;

        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');
            $userManager->updateUser($editUser);

            $session = $this->getRequest()->getSession();
            $session->getFlashBag()->add('message', 'Votre profil a été modifié');
            $url = $this->generateUrl('matrix_edi_viewUser');
            $response = new RedirectResponse($url);

        }

        return $this->render('user/user.html.twig', array(
            "idUser" => $idUser,
            "form" => $form->createView()
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
