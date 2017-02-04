<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Sport;
use AppBundle\Entity\Club;
use AppBundle\Entity\Evenement;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="indexAdmin")
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

    	$indexSportNoValid = $em->getRepository('AppBundle:Sport')->sportIndexAdmin();
    	$indexClubNoValid = $em->getRepository('AppBundle:Club')->clubIndexAdmin();
    	$indexEventNoValid = $em->getRepository('AppBundle:Evenement')->eventIndexAdmin();

        // return $this->render('ASPAdminSportBundle:Default:index.html.twig');
        return $this->render('admin/index.html.twig', array(
        	"indexSportNoValid" => $indexSportNoValid ,
        	"indexClubNoValid" => $indexClubNoValid ,
        	"indexEventNoValid" => $indexEventNoValid
        ));
    }

    /**
     * @Route("/indexAdminClub/{idClub}", requirements={"idClub" = "\d+"}, name="indexAdminClub")
     */
    public function indexAdminClubAction($idClub, Request $request){
        $em = $this->getDoctrine()->getManager();

        // Get the club to update
        $updateClub = $em->getRepository('AppBundle:Club')->find($idClub);
        // Get the actual confirmAdmin
        $actualConfirmAdmin = $updateClub->getConfirmAdmin();

        if($actualConfirmAdmin == 0){
            $updateClub->setConfirmAdmin(1);
        }
        else{
            $updateClub->setConfirmAdmin(0);
        }

        // Update Bdd
        $em->persist($updateClub);
        $em->flush();

        // Get complete url 
        $requestUri = $request->getRequestUri();

        $toReplace = "/indexAdminClub/".$idClub;

        $url = str_replace($toReplace, "/", $requestUri);
        
        return $this->redirect($url, 301);
    }

    /**
     * @Route("/indexAdminSport/{idSport}", requirements={"idSport" = "\d+"}, name="indexAdminSport")
     */
    public function indexAdminSportAction($idSport, Request $request){
        $em = $this->getDoctrine()->getManager();

        // Get the event to update
        $updateSport = $em->getRepository('AppBundle:Sport')->find($idSport);
        
        // Get the actual confirmAdmin
        $actualConfirmAdmin = $updateSport->getConfirmAdmin();

        if($actualConfirmAdmin == 0){
            $updateSport->setConfirmAdmin(1);
        }
        else{
            $updateSport->setConfirmAdmin(0);
        }

        // Update Bdd
        $em->persist($updateSport);
        $em->flush();

        // Get complete url 
        $requestUri = $request->getRequestUri();

        $toReplace = "/indexAdminClub/".$idSport;

        $url = str_replace($toReplace, "/", $requestUri);
        
        return $this->redirect($url, 301);
    }

    /**
     * @Route("/indexAdminEvent/{idEvent}", requirements={"idEvent" = "\d+"}, name="indexAdminEvent")
     */
    public function indexAdminEventAction($idEvent, Request $request)
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

        $toReplace = "/indexAdminEvent/".$idEvent;

        $url = str_replace($toReplace, "/", $requestUri);
        
        return $this->redirect($url, 301);
    }
}
