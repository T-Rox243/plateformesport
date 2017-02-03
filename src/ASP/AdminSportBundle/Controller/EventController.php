<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EventController extends Controller
{
    /**
     * @Route("/adminEvent", name="adminEvent")
     */
    public function adminEventAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $allEventNoValid = $em->getRepository('AppBundle:Evenement')->eventAdminNoValid();
        
        $allEventValid = $em->getRepository('AppBundle:Evenement')->eventAdminValid();

        return $this->render('admin/admin_event.html.twig', array(
        	"allEventNoValid" => $allEventNoValid ,
        	"allEventValid" => $allEventValid
        ));
    }

}
