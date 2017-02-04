<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Sport;

class SportController extends Controller
{
    /**
     * @Route("/adminSport", name="adminSport")
     */
    public function adminSportAction()
    {
    	$em = $this->getDoctrine()->getManager();
        
        $allSportNoValid = $em->getRepository('AppBundle:Sport')->sportAdminNoValid();
        
        $allSportValid = $em->getRepository('AppBundle:Sport')->sportAdminValid();


        return $this->render('admin/admin_sport.html.twig', array(
        	"allSportNoValid" => $allSportNoValid,
        	"allSportValid" => $allSportValid
        ));
    }

    /**
     * @Route("/powerAdminSport/{idSport}", requirements={"idSport" = "\d+"}, name="powerAdminSport")
     */
    public function powerAdminSportAction($idSport, Request $request){
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

        $toReplace = "/powerAdminSport/".$idSport;

        $url = str_replace($toReplace, "/adminSport", $requestUri);
        
        return $this->redirect($url, 301);
    }
}
