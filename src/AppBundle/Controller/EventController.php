<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


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

        // On veut le nom du créateur, le nom de l'event et autre informations
        // Bon je dois encore peaufiner les details pour recuperer le nom des benevoles et le nombre

        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('AppBundle:Evenement')->find($idEvent);
        // $eventBenevole = $em->getRepository('AppBundle:Evenement')->findBy(array('evenement' => $event));

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
    public function editEventAction($idEvent)
    {

        $em = $this->getDoctrine()->getManager();

        $editEvent = $em->getRepository('AppBundle:Evenement')->find($idEvent);

        // Set le nom, vérifier que la personne connectée correspond à celui qui à créer l'evenement
        $editEvent->setName("Stage Aikido - Cocatre");
        // ... Set ce qu'on le veut

        $em->persist($editEvent);

        $em->flush();

        return $this->render('event/edit_event.html.twig', array(
            "idEvent" => $idEvent
        ));
    }

    /**
     * @Route("/addEvent", name="addEvent")
     */
    public function addEventAction()
    {
        $em = $this->getDoctrine()->getManager();

        // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
        $idConnectedUser = $this->getUser()->getId();

        // On recupere l'id de l'user qui creer l'evenement
        // A voir comment on recuperer l'id sans le mettre dans la route
        // session ?
        $user = $em->getRepository("AppBundle:User")->find($idConnectedUser);

        // // Mise en place des adresses pour les evenements
        // $adresse1 = new Adresse();
        // $adresse2 = new Adresse();
        // $adresse3 = new Adresse();
        // $adresse4 = new Adresse();

        // // Edition de l'adresse
        // $adresse1->setAdresse("150 rue des arts martiaux");
        // $adresse2->setAdresse("150 rue des arts martiaux");
        // $adresse3->setAdresse("150 rue des arts martiaux");
        // $adresse4->setAdresse("150 rue des arts martiaux");

        // // Edition de la ville
        // $adresse1->setCity("Paris");
        // $adresse2->setCity("Paris");
        // $adresse3->setCity("Paris");
        // $adresse4->setCity("Paris");

        // // Edition du code postal (en string)
        // $adresse1->setPostalCode("75013");
        // $adresse2->setPostalCode("75013");
        // $adresse3->setPostalCode("75013");
        // $adresse4->setPostalCode("75013");

        // // Edition de la region de l'adresse
        // $adresse1->setRegion("Ile-de-France");
        // $adresse2->setRegion("Ile-de-France");
        // $adresse3->setRegion("Ile-de-France");
        // $adresse4->setRegion("Ile-de-France");


        // // Mise en place des evenements
        // $event1 = new Evenement();
        // $event2 = new Evenement();
        // $event3 = new Evenement();
        // $event4 = new Evenement();

        // $event1->setName("Aikido - Stage FEDE");
        // $event2->setName("Viet Vo Dao - Competion");
        // $event3->setName("Pencak-Silat - Stage découverte");
        // $event4->setName("Histoire des arts martiaux");

        // $event1->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");
        // $event2->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");
        // $event3->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");
        // $event4->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");

        // $event1->setStartDate(new \DateTime(date("d-m-Y")));
        // $event2->setStartDate(new \DateTime(date("d-m-Y")));
        // $event3->setStartDate(new \DateTime(date("d-m-Y")));
        // $event4->setStartDate(new \DateTime(date("d-m-Y")));

        // $event1->setEndDate(new \DateTime(date("d-m-Y")));
        // $event2->setEndDate(new \DateTime(date("d-m-Y")));
        // $event3->setEndDate(new \DateTime(date("d-m-Y")));
        // $event4->setEndDate(new \DateTime(date("d-m-Y")));

        // $event1->setTypeEvent("Stage");
        // $event2->setTypeEvent("Competition");
        // $event3->setTypeEvent("Stage");
        // $event4->setTypeEvent("Exposition");

        // $event1->setNbMinVolunteer(40);
        // $event2->setNbMinVolunteer(80);
        // $event3->setNbMinVolunteer(25);
        // $event4->setNbMinVolunteer(55);

        // $event1->setNbMaxVolunteer(60);
        // $event2->setNbMaxVolunteer(90);
        // $event3->setNbMaxVolunteer(35);
        // $event4->setNbMaxVolunteer(95);

        // $event1->setUser($user);
        // $event2->setUser($user);
        // $event3->setUser($user);
        // $event4->setUser($user);

        // $event1->setAdresse($adresse1);
        // $event2->setAdresse($adresse2);
        // $event3->setAdresse($adresse3);
        // $event4->setAdresse($adresse4);

        // $em->persist($adresse1);
        // $em->persist($adresse2);
        // $em->persist($adresse3);
        // $em->persist($adresse4);

        // $em->persist($event1);
        // $em->persist($event2);
        // $em->persist($event3);
        // $em->persist($event4);

        // $em->flush();

        return $this->render('event/add_event.html.twig', array(
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
        $allEvent = $em->getRepository('AppBundle:Evenement')->findAll();

        return $this->render('event/list_event.html.twig', array(
            "allEvent" => $allEvent
        ));
    }

}
