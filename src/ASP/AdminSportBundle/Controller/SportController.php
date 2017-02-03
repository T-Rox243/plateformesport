<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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

}
