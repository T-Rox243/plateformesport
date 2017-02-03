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
}
