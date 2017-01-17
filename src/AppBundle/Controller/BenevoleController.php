<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Entity\Benevole;
use AppBundle\Entity\Evenement;
use AppBundle\Entity\EvenementBenevole;

class BenevoleController extends Controller
{
    /**
     * @Route("/addBenevole/{idEvent}", requirements={"idEvent" = "\d+"}, name="addBenevole")
     */
    public function addBenevoleAction($idEvent)
    {

    	$em = $this->getDoctrine()->getManager();

    	// Toujours petit test pour eviter qu'un createur d'un evenement ne puissent etre benevole

    	// On check le authorization de sécurité
        $securityContext = $this->container->get('security.authorization_checker');

    	if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            // On recupere l'id de l'user connecté. Seul un utilisateur connecté peut créer un evenement
            $idConnectedUser = $this->getUser()->getId();

            // On recupere l'id de l'user qui creer l'evenement
            $user = $em->getRepository("AppBundle:User")->find($idConnectedUser);
            $event = $em->getRepository("AppBundle:Evenement")->find($idEvent);

            $benevole = new Benevole();
            $benevole->setUser($user);

            $eventBenevole = new EvenementBenevole();
            $eventBenevole->setVolunteerRole("Simple Benevole");
            $eventBenevole->setEvenement($event);
            $eventBenevole->setBenevole($benevole);
            
            $em->persist($eventBenevole);
            $em->persist($benevole);

            $em->flush();

            return $this->redirectToRoute('infoEvent', array('idEvent' => $idEvent));
        }

        return $this->render('AppBundle:Benevole:add_benevole.html.twig', array(
        ));
    }

}
