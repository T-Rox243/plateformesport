<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Club;

class ClubController extends Controller
{
    /**
     * @Route("/adminClub", name="adminClub")
     */
    public function adminClubAction()
    {
    	$em = $this->getDoctrine()->getManager();
        
        $allClubNoValid = $em->getRepository('AppBundle:Club')->clubAdminNoValid();
        
        $allClubValid = $em->getRepository('AppBundle:Club')->clubAdminValid();

        return $this->render('admin/admin_club.html.twig', array(
            "allClubNoValid" => $allClubNoValid,
        	"allClubValid" => $allClubValid
        ));
    }

    /**
     * @Route("/powerAdminClub/{idClub}", requirements={"idClub" = "\d+"}, name="powerAdminClub")
     */
    public function powerAdminClubAction($idClub, Request $request){
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

        $toReplace = "/powerAdminClub/".$idClub;

        $url = str_replace($toReplace, "/adminClub", $requestUri);
        
        return $this->redirect($url, 301);
    }
}
