<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
        // Load du repository Sport en chargeant les informations du sports
        $em = $this->getDoctrine()->getManager();

        $infoSport = $em->getRepository('AppBundle:Sport')->find($idSport);

        $nameSport = $infoSport->getName();
        // ...
        // Ainsi de suite pour le reste des informations

        // Faut que je regarde comme obtenir les noms des clubs pratiquants le sport en question et le nom de l'utilisateur

        return $this->render('sport/sport.html.twig', array(
            "idSport" => $idSport,
            "nameSport" => $nameSport
        ));
    }


    /**
     * @Route("/editSport/{idSport}", requirements={"idSport" = "\d+"}, name="editSport")
     */
    public function editSportAction($idSport)
    {

        $em =  $this->getDoctrine()->getManager();

        // Attention, on ne peut le faire que si la personne est connecté et que c'est l'utilisateur qui a creer ce sport
        $editSport = $em->getRepository("AppBundle:Sport")->find($idSport);

        $editSport->setName("Aikido Cocatre");
        // ...
        // On peut setDescription et autre, mais vérifier ce qui a été remplie pour l'edition

        // Persit de la modification
        $em->persist($editSport);

        $em->flush();

        $newName = $editSport->getName();

        return $this->render('sport/edit_sport.html.twig', array(
            "idSport" => $idSport,
            "newName" => $newName
        ));
    }

    /**
     * @Route("/addSport", name="addSport")
     */
    public function addSportAction()
    {

        // Création d'un objet sport
        $sport = new Sport();

        // Creation d'un formulaire se basant sur l'objet sport
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $sport);

        $formBuilder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('nativeCountry', TextType::class)
            ->add('competition', CheckboxType::class)
            ->add('sportswear', ChoiceType::class, array(
                'choices'  => array(
                    'Maybe' => null,
                    'Yes' => true,
                    'No' => false,
                ))
            )
            ->add('send', SubmitType::class);

        $form = $formBuilder->getForm();

        // Connexion a doctrine pour insertion de l'objet
        $em = $this->getDoctrine()->getManager();

        // On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');
        
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            // On recupere les informations de l'user
            $user = $em->getRepository("AppBundle:User")->find($idConnectedUser);
            
        }




        // if (null === $user) {
        //     throw new NotFoundHttpException("Cette utilisateur n'existe pas ");
        // }

        // // Creation des nouveaux sport
        // $sport1 = new Sport();
        // $sport2 = new Sport();
        // $sport3 = new Sport();
        // $sport4 = new Sport();

        // // On donne un nom
        // $sport1->setName("Yoseikan Budo");
        // $sport2->setName("Bokator");
        // $sport3->setName("Jödö");
        // $sport4->setName("Qwan Ki Do");

        // // On met une description
        // $sport1->setDescription("percussions (mains, pieds, genoux, coudes, tête), clefs (torsions et extensions articulaires), projections, étranglements, immobilisations, armes (recouvertes de mousse ou traditionnelles). Matériel de protection corporel complet pour les combats.");
        // $sport2->setDescription("à mains nues ou avec une arme. En complément des techniques de bras qui ont pour but de provoquer une diversion ou/et neutraliser un adversaire.");
        // $sport3->setDescription("combat avec un bâton droit de 1 mètre 28 de long et de 2,5 cm de diamètre. Les mouvements sont réglés sous la forme de katas.");
        // $sport4->setDescription("percutions (poing, tranchant de la main, coude, avant bras, pied, genou...), armes (bâton, serpe, machette, couteau, tri-bâton, chaîne), armes militaires (lance, sabre long/court, sabre papillon, éventail en acier, épée, sabre chinois).");

        // // On informe le pays d'origine du sport
        // $sport1->setNativeCountry("Japon");
        // $sport2->setNativeCountry("Cambodge");
        // $sport3->setNativeCountry("Japon");
        // $sport4->setNativeCountry("Vietnam");

        // // Competition ou pas ?
        // $sport1->setCompetition(false);
        // $sport2->setCompetition(false);
        // $sport3->setCompetition(false);
        // $sport4->setCompetition(false);

        // // Tenu de sport
        // $sport1->setSportSwear("Kimono Classique");
        // $sport2->setSportSwear("Short et TShirt");
        // $sport3->setSportSwear("Kimono et Hakama");
        // $sport4->setSportSwear("Kimono Vietnamien");

        // // On persiste le sport
        // $em->persist($sport1);
        // $em->persist($sport2);
        // $em->persist($sport3);
        // $em->persist($sport4);

        // // On dit que le sport est ajouté par l'utilisateur selectionné
        // $user->addSport($sport1);
        // $user->addSport($sport2);
        // $user->addSport($sport3);
        // $user->addSport($sport4);

        // // On insere en bdd
        // $em->flush();

        return $this->render('sport/add_sport.html.twig', array(
            'form' => $form->createView()
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

        // Chargement du manager 
        $em = $this->getDoctrine()->getManager();

        // Tout les utilisateurs, car c'est eux qui ont permis de generer les sports
        $users = $em->getRepository('AppBundle:User')->findAll();
        $listSport = array(); 

        // On recupere tout les sports existants dans la base grace à la methode. La methode se trouve dans le controller User 
        foreach ($users as $user) {
            $listSport []= $user->getSports();
        }
        

        return $this->render('sport/list_sport.html.twig', array(
            "listSport" => $listSport
        ));
    }

}
