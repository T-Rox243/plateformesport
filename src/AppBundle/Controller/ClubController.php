<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\ClubType;
use AppBundle\Form\MediaType;

use AppBundle\Entity\Club;
use AppBundle\Entity\User;
use AppBundle\Entity\Media;
use AppBundle\Entity\Adresse;

class ClubController extends Controller
{
    /**
     * @Route("/club/{idClub}", requirements={"idClub" = "\d+"}, name="infoClub")
     */
    public function clubAction($idClub)
    {
        $em = $this->getDoctrine()->getManager();

        $club = $em->getRepository('AppBundle:Club')->find($idClub);

        $test = $em->getRepository('AppBundle:Club')->monTestAMoi();

        return $this->render('club/club.html.twig', array(
            "idClub" => $idClub,
            "infoClub" => $club,
            "test" => $test
        ));
    }


    /**
     * @Route("/editClub/{idClub}", requirements={"idClub" = "\d+"}, name="editClub")
     */
    public function editClubAction($idClub, Request $request)
    {

        // On recupere le manager de doctrine
        $em = $this->getDoctrine()->getManager();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');

        // On recupere les informations du club à editer
        $editClub = $em->getRepository('AppBundle:Club')->find($idClub);
        // $media = new Media();

        // On va mettre en place le formulaire avec l'objet editClub que nous venons de récupérer
        $formBuilderClub = $this->get('form.factory')->createBuilder(ClubType::class, $editClub);
        // $formBuilderTest= $this->get('form.factory')->createBuilder(MediaType::class, $media);
        $formBuilderClub->add('medias', CollectionType::class, array(
            'entry_type'    => MediaType::class,
            'allow_add'     => true,
            'allow_delete'  => true
        ));

        // Mise en place du formulaire
        $formClub = $formBuilderClub->getForm();

        if (null === $editClub) {
            throw new NotFoundHttpException("Le club d'id ".$idClub." n'existe pas.");
        }

        // On verifie que l'utilisateur soit connecté pour in
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            /********************************************************************************
            ***** On doit veriifer que l'utilisateur soit le même que celui qui a créér *****
            ********************************************************************************/

            // Seul un utilisateur connecté peut creer un club
            $user = $em->getRepository('AppBundle:User')->find($idConnectedUser);

            // On verifie que le boutton submit 
            if($request->isMethod('POST')){

                // Hydrate l'objet avec les données saisies dans le formulaire
                $formClub->handleRequest($request);

                if($formClub->isValid()){
                    $em->persist($editClub);

                    // Insertion dans la bdd
                    $em->flush();
                }
            }
        }

        return $this->render('club/edit_club.html.twig', array(
            "idClub" => $idClub,
            "formClub" => $formClub->createView()
        ));
    }

    /**
     * @Route("/addClub", name="addClub")
     */
    public function addClubAction(Request $request)
    {

        // On recupere le manager de doctrine 
        $em = $this->getDoctrine()->getManager();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');
        
        // Mise en place des clubs, jeux de données pour les tests
        $club = new Club();

        // Creation d'un formulaire se basant sur l'objet sport
        $formBuilderClub = $this->get('form.factory')->createBuilder(ClubType::class, $club);

        // Mise en place du formulaire
        $formClub = $formBuilderClub->getForm();

        // On verifie que l'utilisateur soit connecté pour in
        if ( $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED') )
        {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            // Seul un utilisateur connecté peut creer un club
            $user = $em->getRepository('AppBundle:User')->find($idConnectedUser);

            // On verifie que le boutton submit 
            if( $request->isMethod('POST') )
            {

                // Hydrate l'objet avec les données saisies dans le formulaire
                $formClub->handleRequest($request);

                if($formClub->isValid()){
                    $em->persist($club);

                    // Reference à l'utilisateur
                    $club->setUser($user);

                    // Insertion dans la bdd
                    $em->flush();
                }
            }
        }

        return $this->render('club/add_club.html.twig', array(
            "formClub" => $formClub->createView(),
        ));
    }

    /**
     * @Route("/searchClub", name="searchClub")
     */
    public function searchClubAction()
    {
        return $this->render('club/search_club.html.twig', array(
        ));
    }

    /**
     * @Route("/listClub", name="listClub")
     */
    public function listClubAction()
    {

        $em = $this->getDoctrine()->getManager();

        $listClub = $em->getRepository('AppBundle:Club')->findAll();

        return $this->render('club/list_club.html.twig', array(
            "listClub" => $listClub
        ));
    }

}
