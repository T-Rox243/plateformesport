<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Club;
use AppBundle\Entity\User;
use AppBundle\Entity\Media;
use AppBundle\Entity\Adresse;

class ClubController extends Controller
{
    /**
     * @Route("/club/{idClub}", requirements={"idClub" = "\d+"}, name="infoClub")
     */
    public function clubAction($idClub)
    {
        return $this->render('club/club.html.twig', array(
            "idClub" => $idClub
        ));
    }


    /**
     * @Route("/editClub/{idClub}", requirements={"idClub" = "\d+"}, name="editClub")
     */
    public function editClubAction($idClub)
    {
        return $this->render('club/edit_club.html.twig', array(
            "idClub" => $idClub
        ));
    }

    /**
     * @Route("/addClub", name="addClub")
     */
    public function addClubAction()
    {

        return $this->render('club/add_club.html.twig', array(
        ));
    }

    /**
     * @Route("/searchClub", name="searchClub")
     */
    public function searchClubAction()
    {
        return $this->render('club/search_club.html.twig', array(
        ));
    }

    /**
     * @Route("/listClub", name="listClub")
     */
    public function listClubAction()
    {
        return $this->render('club/list_club.html.twig', array(
        ));
    }

}
