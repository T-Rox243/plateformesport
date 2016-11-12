<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
