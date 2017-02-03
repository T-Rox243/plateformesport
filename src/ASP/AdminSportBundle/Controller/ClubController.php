<?php

namespace ASP\AdminSportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClubController extends Controller
{
    /**
     * @Route("/adminClub", name="adminClub")
     */
    public function adminClubAction()
    {
        return $this->render('admin/admin_club.html.twig', array());
    }

}
