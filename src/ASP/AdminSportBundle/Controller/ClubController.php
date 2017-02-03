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
        
        $allClub = $em->getRepository('AppBundle:Club')->findAll();

        return $this->render('admin/admin_club.html.twig', array(
        	"allClub" => $allClub
        ));
    }

}
