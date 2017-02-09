<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\SportType;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Sport;
use AppBundle\Entity\Club;
use AppBundle\Entity\User;
use AppBundle\Entity\Media;


class SportController extends Controller
{
     /**
     * @Route("/sport/{idSport}", requirements={"idSport" = "\d+"}, name="infoSport")
     */
    public function sportAction($idSport)
    {
        // Load du repository Sport en chargeant les informations du sports
        $em = $this->getDoctrine()->getManager();

        $infoSport = $em->getRepository('AppBundle:Sport')->find($idSport);

        if (null === $infoSport) {
            // throw new NotFoundHttpException("Le club d'id ".$idEvent." n'existe pas.");
            return $this->render('default/404.html.twig', array());
        }
        
        $nameSport = $infoSport->getName();

        $description = $infoSport->getDescription();

        $country = $infoSport->getNativeCountry();

        $competTMP = $infoSport->getCompetition();
        if(!$competTMP)
            $competition = 'non';
        else
            $competition = 'oui';

        $sportSwear = $infoSport->getSportswear();

        // On regarge si l'utilsateur peut editer le contenu
        $createUserConnected = false;

        $securityContext = $this->container->get('security.authorization_checker');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            // On recupere l'id de l'user connecté. Seul un utilisateur qui l'a créer peut editer le sport
            $idConnectedUser = $this->getUser()->getId();

            $theUser = $em->getRepository('AppBundle:User')->find($idConnectedUser);
            
            // On recupere les sports créés par l'utilisateur
            $idUserSport = $theUser->getSports();
            
            $idSportCreateByUser = array();

             // Tableau contenant les id des sports créer par l'utilisateur 
            foreach ($idUserSport as $user) {
                $idSportCreateByUser[] = $user->getId();
            }

            if (in_array($idSport, $idSportCreateByUser)){
                $createUserConnected = true;
            }
        }


        // Faut que je regarde comme obtenir les noms des clubs pratiquants le sport en question et le nom de l'utilisateur
        return $this->render('sport/sport.html.twig', array(
            "idSport" => $idSport,
            "nameSport" => $nameSport,
            "description" => $description,
            "country" => $country,
            "competition" => $competition,
            "sportSwear" => $sportSwear,
            "createUserConnected" => $createUserConnected
        ));
    }


    /**
     * @Route("/editSport/{idSport}", requirements={"idSport" = "\d+"}, name="editSport")
     */
    public function editSportAction($idSport, Request $request)
    {
        // On va charger le manager doctrine
        $em =  $this->getDoctrine()->getManager();

        $securityContext = $this->container->get('security.authorization_checker');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            // On recupere l'id de l'user connecté. Seul un utilisateur qui l'a créer peut editer le sport
            $idConnectedUser = $this->getUser()->getId();

            $theUser = $em->getRepository('AppBundle:User')->find($idConnectedUser);
            
            // On recupere les sports créés par l'utilisateur
            $idUserSport = $theUser->getSports();
            
            $idSportCreateByUser = array();
            
            // Tableau contenant les id des sports créer par l'utilisateur 
            foreach ($idUserSport as $user) {
                $idSportCreateByUser[] = $user->getId();
            }

            if (in_array($idSport, $idSportCreateByUser)){
                // Attention, on ne peut le faire que si la personne est connecté et que c'est l'utilisateur qui a creer ce sport
                $editSport = $em->getRepository('AppBundle:Sport')->find($idSport);

                // Creation d'un formulaire se basant sur l'objet sport
                $formBuilder = $this->get('form.factory')->createBuilder(SportType::class, $editSport);

                // Mise en place du formulaire
                $form = $formBuilder->getForm();
                
                // On va aussi verifié que l'utilisateur est connecté et que l'id user est le même que celui qui a créé le sport
                if($request->isMethod('POST')){
                    // Hydrate l'objet avec les données saisies dans le formulaire
                    $form->handleRequest($request);

                    // On verifie que les données coordonnes bien avec le'objet
                    if($form->isValid()){
                        // Ajout d'un sport
                        $em->persist($editSport);

                        // Insertion dans la bdd
                        $em->flush();
                    }
                }

                return $this->render('sport/edit_sport.html.twig', array(
                    "idSport" => $idSport,
                    "form" => $form->createView()
                ));
            }
            else
            {
                // on recupere la route complete
                $requestUri = $request->getRequestUri();

                // On met en place ce qu'on souhaite remplacer dans l'url            
                $toReplace = "/editSport/".$idSport;

                // Retravaille de l'url
                $url = str_replace($toReplace, "/", $requestUri);

                return $this->redirect($url, 301);
            }
        }
        else
        {  
            // on recupere la route complete
            $requestUri = $request->getRequestUri();

            // On met en place ce qu'on souhaite remplacer dans l'url            
            $toReplace = "/editSport/".$idSport;
            
            // Retravaille de l'url
            $url = str_replace($toReplace, "/", $requestUri);
            
            return $this->redirect($url, 301);
        }
    }

    /**
     * @Route("/addSport", name="addSport")
     */
    public function addSportAction(Request $request)
    {
        // Connexion a doctrine pour insertion de l'objet
        $em = $this->getDoctrine()->getManager();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');

        // Création d'un objet sport
        $sport = new Sport();

        // Creation d'un formulaire se basant sur l'objet sport
        $formBuilder = $this->get('form.factory')->createBuilder(SportType::class, $sport);

        // Mise en place du formulaire
        $form = $formBuilder->getForm();
        
        // On verifie que l'utilisateur soit connecté pour in
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            // On recupere les informations de l'user
            $user = $em->getRepository("AppBundle:User")->find($idConnectedUser);

            // On verifie que le boutton submit 
            if($request->isMethod('POST')){

                // Hydrate l'objet avec les données saisies dans le formulaire
                $form->handleRequest($request);

                // On verifie que les données coordonnes bien avec le'objet
                if($form->isValid()){
                    // Ajout d'un sport
                    $em->persist($sport);

                    // Lien avec l'user
                    $user->addSport($sport);

                    // Insertion dans la bdd
                    $em->flush();

                    //message d'info pour l'ajout du sport
                    $this->addFlash(
                        'notice',
                        'Sport créé !'
                    );
                }
            }
        }

        return $this->render('sport/add_sport.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/searchSport", name="searchSport")
     */
    public function searchSportAction()
    {
        return $this->render('sport/search_sport.html.twig', array(
        ));
    }

    /**
     * @Route("/listSport", name="listSport")
     */
    public function listSportAction()
    {

        // Chargement du manager 
        $em = $this->getDoctrine()->getManager();

        $listSport = $em->getRepository('AppBundle:Sport')->sportAdminValid();

        return $this->render('sport/list_sport.html.twig', array(
            "listSport" => $listSport
        ));
        
        // Tout les utilisateurs, car c'est eux qui ont permis de generer les sports
        // $users = $em->getRepository('AppBundle:User')->findAll();
        // $listSport = array(); 

        // $test = $em->getRepository('AppBundle:User')->getValidSport();
        // var_dump($test);

        // On recupere tout les sports existants dans la base grace à la methode. La methode se trouve dans le controller User 
        // foreach ($users as $user) {
            // $listSport []= $user->getSports();
        // }
    }

}
