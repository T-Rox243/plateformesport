<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Form\ClubType;
use Symfony\Component\HttpFoundation\Request;

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

        return $this->render('club/club.html.twig', array(
            "idClub" => $idClub,
            "infoClub" => $club
        ));
    }


    /**
     * @Route("/editClub/{idClub}", requirements={"idClub" = "\d+"}, name="editClub")
     */
    public function editClubAction($idClub)
    {

        $em = $this->getDoctrine()->getManager();

        $editClub = $em->getRepository('AppBundle:Club')->find($idClub);

        if (null === $editClub) {
            throw new NotFoundHttpException("Le club d'id ".$idClub." n'existe pas.");
        }

        $em->persist($editClub);
        $em->clear(); // Juste pour eviter d'editer, a supprimer
        $em->flush();

        return $this->render('club/edit_club.html.twig', array(
            "idClub" => $idClub
        ));
    }

    /**
     * @Route("/addClub", name="addClub")
     */
    public function addClubAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');
        
        // Mise en place des clubs, jeux de données pour les tests
        $club = new Club();
        $adresse = new Adresse();

        // Creation d'un formulaire se basant sur l'objet sport
        $formBuilderClub = $this->get('form.factory')->createBuilder(ClubType::class, $club);

        // Mise en place du formulaire
        $formClub = $formBuilderClub->getForm();

        // On verifie que l'utilisateur soit connecté pour in
        // if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
        //     // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
        //     $idConnectedUser = $this->getUser()->getId();

        //     // Seul un utilisateur connecté peut creer un club
        //     $user = $em->getRepository('AppBundle:User')->find($idConnectedUser);

        //      // On verifie que le boutton submit 
        //     if($request->isMethod('POST')){
        //         // Hydrate l'objet avec les données saisies dans le formulaire
        //         $formClub->handleRequest($request);
        //         $formAdresse->handleRequest($request);

        //         // On verifie que les données coordonnes bien avec le'objet
        //         if($formAdresse->isValid()){
        //             $club->setAdresse($adresse);
        //             $em->persist($adresse);
        //         }

        //         if($formClub->isValid()){
        //            var_dump($club);
        //            $em->persist($club);

        //             // Lien avec l'user
        //             $user->addClub($club);

        //             // Insertion dans la bdd
        //             $em->flush();
        //         }
        //     }
        // }

        return $this->render('club/add_club.html.twig', array(
            "formClub" => $formClub->createView(),
        ));

        // // Possibilité de l'associer à un sport
        // // $sport1 = $em->getRepository('AppBundle:Sport')->find(1);
        // // $sport2 = $em->getRepository('AppBundle:Sport')->find(2);

        // // Association à un sport
        // $club1->setSport($sport1);
        // $club2->setSport($sport2);
        // $club3->setSport($sport2);
        // $club4->setSport($sport2);

        // // Mise en place de l'adresse
        // $adresse1 = new Adresse();
        // $adresse2 = new Adresse();
        // $adresse3 = new Adresse();
        // $adresse4 = new Adresse();

        // // Adresse 
        // $adresse1->setAdresse("150 rue des arts martiaux");
        // $adresse2->setAdresse("150 rue des arts martiaux");
        // $adresse3->setAdresse("150 rue des arts martiaux");
        // $adresse4->setAdresse("150 rue des arts martiaux");

        // // Edition de la ville
        // $adresse1->setCity("Vitry-Sur-Seine ");
        // $adresse2->setCity("Vitry-Sur-Seine ");
        // $adresse3->setCity("Vitry-Sur-Seine ");
        // $adresse4->setCity("Vitry-Sur-Seine ");

        // // Edition du code postal (en string)
        // $adresse1->setPostalCode("94400");
        // $adresse2->setPostalCode("94400");
        // $adresse3->setPostalCode("94400");
        // $adresse4->setPostalCode("94400");

        // // Edition de la region de l'adresse
        // $adresse1->setRegion("Ile-de-France");
        // $adresse2->setRegion("Ile-de-France");
        // $adresse3->setRegion("Ile-de-France");
        // $adresse4->setRegion("Ile-de-France");

        // $club1->setAdresse($adresse1);
        // $club2->setAdresse($adresse2);
        // $club3->setAdresse($adresse3);
        // $club4->setAdresse($adresse4);

        // $user->addClub($club1);
        // $user->addClub($club2);
        // $user->addClub($club3);
        // $user->addClub($club4);

        // $em->persist($adresse1);
        // $em->persist($adresse2);
        // $em->persist($adresse3);
        // $em->persist($adresse4);

        // $em->persist($club1);
        // $em->persist($club2);
        // $em->persist($club3);
        // $em->persist($club4);

        // $em->flush();
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
