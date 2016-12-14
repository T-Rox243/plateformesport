<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
        $em = $this->getDoctrine()->getManager();

        $club = $em->getRepository('AppBundle:Club')->find($idClub);

        return $this->render('club/club.html.twig', array(
            "idClub" => $idClub,
            "infoClub" => $club
        ));
    }


    /**
     * @Route("/editClub/{idClub}", requirements={"idClub" = "\d+"}, name="editClub")
     */
    public function editClubAction($idClub)
    {

        $em = $this->getDoctrine()->getManager();

        $editClub = $em->getRepository('AppBundle:Club')->find($idClub);

        if (null === $editClub) {
            throw new NotFoundHttpException("Le club d'id ".$idClub." n'existe pas.");
        }

        $em->persist($editClub);
        $em->clear(); // Juste pour eviter d'editer, a supprimer
        $em->flush();

        return $this->render('club/edit_club.html.twig', array(
            "idClub" => $idClub
        ));
    }

    /**
     * @Route("/addClub", name="addClub")
     */
    public function addClubAction()
    {

        $em = $this->getDoctrine()->getManager();

        // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
        // $idConnectedUser = $this->getUser()->getId();

        // Seul un utilisateur connecté peut creer un club
        // $user = $em->getRepository('AppBundle:User')->find($idConnectedUser);

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');
        
        // Mise en place des clubs, jeux de données pour les tests
        // $club1 = new club();
        // $club2 = new club();
        // $club3 = new club();
        // $club4 = new club();

        // $club1->setName("ESV Aikido");
        // $club2->setName("ESV Viet Vo Dao");
        // $club3->setName("Les Apaches de Paname");
        // $club4->setName("Cercle Yoshitaka Sensei");

        // $club1->setDescription("Description du club à mettre. Comme pour les evenements je n'ai pas d'idée donc on va rester à un texte pas trop long mais qui peut donner une idée de ce que pourrait donner une description au niveau de la longueur.");
        // $club2->setDescription("Description du club à mettre. Comme pour les evenements je n'ai pas d'idée donc on va rester à un texte pas trop long mais qui peut donner une idée de ce que pourrait donner une description au niveau de la longueur.");
        // $club3->setDescription("Description du club à mettre. Comme pour les evenements je n'ai pas d'idée donc on va rester à un texte pas trop long mais qui peut donner une idée de ce que pourrait donner une description au niveau de la longueur.");
        // $club4->setDescription("Description du club à mettre. Comme pour les evenements je n'ai pas d'idée donc on va rester à un texte pas trop long mais qui peut donner une idée de ce que pourrait donner une description au niveau de la longueur.");
        
        // $club1->setOpeningTime("16h");
        // $club2->setOpeningTime("17h");
        // $club3->setOpeningTime("15h30");
        // $club4->setOpeningTime("17h");

        // $club1->setClosingTime("22h");
        // $club2->setClosingTime("21h30");
        // $club3->setClosingTime("20h");
        // $club4->setClosingTime("22h");

        // $club1->setEmailContact("club1-contact@gmail.com");
        // $club2->setEmailContact("club2-contact@gmail.com");
        // $club3->setEmailContact("club3-contact@gmail.com");
        // $club4->setEmailContact("club4-contact@gmail.com");

        // $club1->setPhoneContact("0698967027");
        // $club2->setPhoneContact("0698967027");
        // $club3->setPhoneContact("0698967027");
        // $club4->setPhoneContact("0698967027");


        // // Complexe sportif
        // $club1->setSportComplex("Stade Gosnat");
        // $club2->setSportComplex("Stade Gosnat");
        // $club3->setSportComplex("Stade Julio Curry");
        // $club4->setSportComplex("Stade Gabriel Peri");

        // $club1->setSportComplexCity("Vitry-Sur-Seine");
        // $club2->setSportComplexCity("Vitry-Sur-Seine");
        // $club3->setSportComplexCity("Vitry-Sur-Seine");
        // $club4->setSportComplexCity("Vitry-Sur-Seine");

        // // Possibilité de l'associer à un sport
        // // $sport1 = $em->getRepository('AppBundle:Sport')->find(1);
        // // $sport2 = $em->getRepository('AppBundle:Sport')->find(2);

        // // Association à un sport
        // $club1->setSport($sport1);
        // $club2->setSport($sport2);
        // $club3->setSport($sport2);
        // $club4->setSport($sport2);

        // // Mise en place de l'adresse
        // $adresse1 = new Adresse();
        // $adresse2 = new Adresse();
        // $adresse3 = new Adresse();
        // $adresse4 = new Adresse();

        // // Adresse 
        // $adresse1->setAdresse("150 rue des arts martiaux");
        // $adresse2->setAdresse("150 rue des arts martiaux");
        // $adresse3->setAdresse("150 rue des arts martiaux");
        // $adresse4->setAdresse("150 rue des arts martiaux");

        // // Edition de la ville
        // $adresse1->setCity("Vitry-Sur-Seine ");
        // $adresse2->setCity("Vitry-Sur-Seine ");
        // $adresse3->setCity("Vitry-Sur-Seine ");
        // $adresse4->setCity("Vitry-Sur-Seine ");

        // // Edition du code postal (en string)
        // $adresse1->setPostalCode("94400");
        // $adresse2->setPostalCode("94400");
        // $adresse3->setPostalCode("94400");
        // $adresse4->setPostalCode("94400");

        // // Edition de la region de l'adresse
        // $adresse1->setRegion("Ile-de-France");
        // $adresse2->setRegion("Ile-de-France");
        // $adresse3->setRegion("Ile-de-France");
        // $adresse4->setRegion("Ile-de-France");

        // $club1->setAdresse($adresse1);
        // $club2->setAdresse($adresse2);
        // $club3->setAdresse($adresse3);
        // $club4->setAdresse($adresse4);

        // $user->addClub($club1);
        // $user->addClub($club2);
        // $user->addClub($club3);
        // $user->addClub($club4);

        // $em->persist($adresse1);
        // $em->persist($adresse2);
        // $em->persist($adresse3);
        // $em->persist($adresse4);

        // $em->persist($club1);
        // $em->persist($club2);
        // $em->persist($club3);
        // $em->persist($club4);

        // $em->flush();

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

        $em = $this->getDoctrine()->getManager();

        $listClub = $em->getRepository('AppBundle:Club')->findAll();

        return $this->render('club/list_club.html.twig', array(
            "listClub" => $listClub
        ));
    }

}
