<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\EvenementType;
use AppBundle\Form\MediaType;

use AppBundle\Entity\User;
use AppBundle\Entity\Benevole;
use AppBundle\Entity\Evenement;
use AppBundle\Entity\EvenementBenevole;
use AppBundle\Entity\Media;
use AppBundle\Entity\Adresse;

class EventController extends Controller
{
    /**
     * @Route("/event/{idEvent}", requirements={"idEvent" = "\d+"}, name="infoEvent")
     */
    public function eventAction($idEvent)
    {
        // Bon je dois encore peaufiner les details pour recuperer le nom des benevoles et le nombre
        // Get manager doctrine
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('AppBundle:Evenement')->find($idEvent);

        // $eventBenevole = $em->getRepository('AppBundle:Evenement')->findBy(array('evenement' => $event));
        if (null === $event) {
            // throw new NotFoundHttpException("Le club d'id ".$idEvent." n'existe pas.");
            return $this->render('default/404.html.twig', array());
        }

        // Mettre aussi en place un bouton pour devenir benevole sur cet evenement
        $nameEvent = $event->getName();
        $descriptionEvent = $event->getDescription();
        $typeEvent = $event->getTypeEvent();
        $userEvent = $event->getUser();

        return $this->render('event/event.html.twig', array(
            "idEvent" => $idEvent,
            "nameEvent" => $nameEvent,
            "descriptionEvent" => $descriptionEvent,
            "typeEvent" => $typeEvent,
            "userEvent" => $userEvent,
        ));
    }


    /**
     * @Route("/editEvent/{idEvent}", requirements={"idEvent" = "\d+"}, name="editEvent")
     */
    public function editEventAction($idEvent, Request $request)
    {
        // On recupere le manager doctrine
        $em = $this->getDoctrine()->getManager();

        // Get info of current event
        $editEvent = $em->getRepository('AppBundle:Evenement')->find($idEvent);

        $formBuilder = $this->get('form.factory')->createBuilder(EvenementType:: class, $editEvent);
        $formBuilder->add('medias', CollectionType::class, array(
            'entry_type'    => MediaType::class,
            'allow_add'     => true,
            'allow_delete'  => true
        ));
        $formBuilder->add('send', SubmitType::class);

        $formEvent = $formBuilder->getForm();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            // On recupere l'id de l'user qui creer l'evenement
            $user = $em->getRepository("AppBundle:User")->find($idConnectedUser);

            /**************************************************************************************************
            ***** On doit comparer voir si l'utilisateur connecté et le même que celui qui a créé l'event *****
            **************************************************************************************************/

            // On verifie que le boutton submit 
            if( $request->isMethod('POST') )
            {
                // Hydrate l'objet avec les données saisies dans le formulaire
                $formEvent->handleRequest($request);

                if( $formEvent->isValid() )
                {
                  $em->persist($editEvent);

                  // Insertion dans la bdd
                  $em->flush(); 
                }
            }
        }

        $em->persist($editEvent);

        $em->flush();

        return $this->render('event/edit_event.html.twig', array(
            "idEvent" => $idEvent,
            "formEvent" => $formEvent->createView()
        ));
    }

    /**
     * @Route("/addEvent", name="addEvent")
     */
    public function addEventAction(Request $request)
    {
        // On recupere le manager de doctrine
        $em = $this->getDoctrine()->getManager();

        // Mise en place de l'objet evenement
        $event = new Evenement();

        $formBuilder = $this->get('form.factory')->createBuilder(EvenementType:: class, $event);
        $formBuilder->add('send', SubmitType::class);

        $formEvent = $formBuilder->getForm();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');

        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            // On recupere l'id de l'user qui creer l'evenement
            $user = $em->getRepository("AppBundle:User")->find($idConnectedUser);

             // On verifie que le boutton submit 
            if( $request->isMethod('POST') )
            {
                // Hydrate l'objet avec les données saisies dans le formulaire
                $formEvent->handleRequest($request);

                if( $formEvent->isValid() )
                {
                  $em->persist($event);
                  
                  // Reference à l'utilisateur
                  $event->setUser($user);

                  // Insertion dans la bdd
                  $em->flush(); 

                    //message d'info pour l'ajout de l'événement
                    $this->addFlash(
                        'notice',
                        'Evénement créé !'
                    );
                }
            }
        }

        return $this->render('event/add_event.html.twig', array(
            "form" => $formEvent->createView()
        ));
    }

    /**
     * @Route("/searchEvent", name="searchEvent")
     */
    public function searchEventAction()
    {
        return $this->render('event/search_event.html.twig', array(
        ));
    }

    /**
     * @Route("/listEvent", name="listEvent")
     */
    public function listEventAction()
    {  

        $em = $this->getDoctrine()->getManager();

        // On recupere tout les evenements
        $allEvent = $em->getRepository('AppBundle:Evenement')->eventAdminValid();

        return $this->render('event/list_event.html.twig', array(
            "allEvent" => $allEvent
        ));
    }

}
