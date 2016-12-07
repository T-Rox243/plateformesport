<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Sport;
use AppBundle\Entity\Club;
use AppBundle\Entity\User;
use AppBundle\Entity\Media;

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
        $em = $this->getDoctrine()->getManager();

        // On recupere l'user numero 1 ici
        $user = $em->getRepository("AppBundle:User")->find(1);

        // Creation des nouveaux sport
        // $sport1 = new Sport();
        // $sport2 = new Sport();
        // $sport3 = new Sport();
        // $sport4 = new Sport();

        // On donne un nom
        // $sport1->setName("Aikido Cocatre");
        // $sport2->setName("Viet Vo Dao");
        // $sport3->setName("Jeet Kune Do");
        // $sport4->setName("Pencak-Silat");

        // On met une description
        // $sport1->setDescription("L'aïkido se compose de techniques avec armes et à mains nues utilisant la force de l'adversaire, ou plutôt son agressivité et sa volonté de nuire. Ces techniques visent non pas à vaincre l'adversaire, mais à réduire sa tentative d'agression à néant");
        // $sport2->setDescription("Sa pratique vise au développement externe (corps), interne (énergie, respiration, méditation...), exercices de santé (gymnastique...), culture et tradition. Il inclut aussi le maniement de nombreuses armes telles : le sabre , le bâton, la hallebarde, le couteau....");
        // $sport3->setDescription("Coups de pied, coups de poing, immobilisation des bras, clés, étranglements et combat au sol. Pas de techniques 'formelles' il s'agit d'un art martial qui se base sur l'instinct et l'instant qui change d'aspect pour s'adapter aux capacités de son adversaire.");
        // $sport4->setDescription("Il s'agit avant tout d'un art de défense qui ne s’appuie pas sur la force physique. Le Pencak-Silat se divise en trois partie : l'art (costume, gestuelle, musique), l'auto-défense (techniques de frappe et de réception des coups) et la spiritualité (maîtrise des connaissances tel que la religion, la physique, l'anatomie, la conception des armes...).");

        // On informe le pays d'origine du sport
        // $sport1->setNativeCountry("Japon");
        // $sport2->setNativeCountry("Vietnam");
        // $sport3->setNativeCountry("Chine");
        // $sport4->setNativeCountry("Indonésie");

        // Competition ou pas ?
        // $sport1->setCompetition(false);
        // $sport2->setCompetition(true);
        // $sport3->setCompetition(false);
        // $sport4->setCompetition(false);

        // Tenu de sport
        // $sport1->setSportSwear("Kimono Classique");
        // $sport2->setSportSwear("Kimono Vietnamien");
        // $sport3->setSportSwear("Tenu Kung Fu");
        // $sport4->setSportSwear("Short et TShirt");

        // On persiste le sport
        // $em->persist($sport1);
        // $em->persist($sport2);
        // $em->persist($sport3);
        // $em->persist($sport4);

        // On dit que le sport est ajouté par l'utilisateur selectionné
        // $user->addSport($sport1);
        // $user->addSport($sport2);
        // $user->addSport($sport3);
        // $user->addSport($sport4);

        // On insere en bdd
        // $em->flush();

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
