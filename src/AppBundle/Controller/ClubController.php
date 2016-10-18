<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClubController extends Controller
{
    /**
     * @Route("/addClub")
     */
    public function addClubAction()
    {
        return $this->render('AppBundle:Club:add_club.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/updateClub")
     */
    public function updateClubAction()
    {
        return $this->render('AppBundle:Club:update_club.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/searchClub")
     */
    public function searchClubAction()
    {
        return $this->render('AppBundle:Club:search_club.html.twig', array(
            // ...
        ));
    }

}
