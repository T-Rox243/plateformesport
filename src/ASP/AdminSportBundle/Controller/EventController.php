<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Evenement;

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

    /**
     * @Route("/powerAdminEvent/{idEvent}", requirements={"idEvent" = "\d+"}, name="powerAdminEvent")
     */
    public function powerAdminEventAction($idEvent, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // Get the event to update
        $updateEvent = $em->getRepository('AppBundle:Evenement')->find($idEvent);
        
        // Get the actual confirmAdmin
        $actualConfirmAdmin = $updateEvent->getConfirmAdmin();

        if($actualConfirmAdmin == 0){
            $updateEvent->setConfirmAdmin(1);
        }
        else{
            $updateEvent->setConfirmAdmin(0);
        }

        // Update Bdd
        $em->persist($updateEvent);
        $em->flush();

        // Get complete url 
        $requestUri = $request->getRequestUri();

        $toReplace = "/powerAdminEvent/".$idEvent;

        $url = str_replace($toReplace, "/adminEvent", $requestUri);
        
        return $this->redirect($url, 301);
    }
}
