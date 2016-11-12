<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SportController extends Controller
{
     /**
     * @Route("/sport/{idSport}", requirements={"idSport" = "\d+"}, name="infoSport")
     */
    public function sportAction($idSport)
    {
        return $this->render('sport/sport.html.twig', array(
            "idSport" => $idSport
        ));
    }


    /**
     * @Route("/editSport/{idSport}", requirements={"idSport" = "\d+"}, name="editSport")
     */
    public function editSportAction($idSport)
    {
        return $this->render('sport/edit_sport.html.twig', array(
            "idSport" => $idSport
        ));
    }

    /**
     * @Route("/addSport", name="addSport")
     */
    public function addSportAction()
    {
        return $this->render('sport/add_sport.html.twig', array(
        ));
    }

    /**
     * @Route("/searchSport", name="searchSport")
     */
    public function searchSportAction()
    {
        return $this->render('sport/search_sport.html.twig', array(
        ));
    }

    /**
     * @Route("/listSport", name="listSport")
     */
    public function listSportAction()
    {
        return $this->render('sport/list_sport.html.twig', array(
        ));
    }

}
