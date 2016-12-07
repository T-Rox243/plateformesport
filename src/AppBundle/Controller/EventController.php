<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        return $this->render('event/event.html.twig', array(
            "idEvent" => $idEvent
        ));
    }


    /**
     * @Route("/editEvent/{idEvent}", requirements={"idEvent" = "\d+"}, name="editEvent")
     */
    public function editEventAction($idEvent)
    {
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

        $event1 = new Evenement();
        $event2 = new Evenement();
        $event3 = new Evenement();
        $event4 = new Evenement();

        $event1->setName("Aikido - Stage FEDE");
        $event2->setName("Viet Vo Dao - Competion");
        $event3->setName("Pencak-Silat - Stage découverte");
        $event4->setName("Histoire des arts martiaux");

        $event1->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");
        $event2->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");
        $event3->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");
        $event4->setDescription("Description de l'evenement à venir, je n'ai pas specialement d'idées. Du coup ca sera le même pour tout les evenements");

        $event1->setStartDate(date("d-m-Y", mktime(0,0,0,7,1,2017)));
        $event2->setStartDate(date("d-m-Y", mktime(0,0,0,7,1,2017)));
        $event3->setStartDate(date("d-m-Y", mktime(0,0,0,7,1,2017)));
        $event4->setStartDate(date("d-m-Y", mktime(0,0,0,7,1,2017)));

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
        return $this->render('event/list_event.html.twig', array(
        ));
    }

}
