<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EventController extends Controller
{
    /**
     * @Route("/addEvent")
     */
    public function addEventAction()
    {
        return $this->render('AppBundle:Event:add_event.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/updateEvent")
     */
    public function updateEventAction()
    {
        return $this->render('AppBundle:Event:update_event.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/searchEvent")
     */
    public function searchEventAction()
    {
        return $this->render('AppBundle:Event:search_event.html.twig', array(
            // ...
        ));
    }

}
