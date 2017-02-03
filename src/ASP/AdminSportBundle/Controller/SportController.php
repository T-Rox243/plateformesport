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
        return $this->render('admin/admin_sport.html.twig', array());
    }

}
