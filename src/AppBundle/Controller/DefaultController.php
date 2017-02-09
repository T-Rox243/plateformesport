<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Sport;
use AppBundle\Entity\Club;
use AppBundle\Entity\Evenement;
use AppBundle\Entity\User;
use AppBundle\Entity\Media;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $lastEvents = $em->getRepository('AppBundle:Evenement')->eventIndex();
        $lastSports = $em->getRepository('AppBundle:Sport')->sportIndex();
        $lastClubs = $em->getRepository('AppBundle:Club')->clubIndex();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
                'lastEvents' => $lastEvents,
                'lastSports' => $lastSports,
                'lastClubs' => $lastClubs,
            )
        );
    }

    /**
     * @Route("/faq", name="foireAuxQuestions")
     */
    public function faqAction()
    {
        return $this->render('default/faq.html.twig', array(
        ));
    }

    /**
     * @Route("/mentionsLegales", name="mentionLegale")
     */
    public function mentionsLegalesAction()
    {
        return $this->render('default/mentions_legales.html.twig', array(
        ));
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('default/contact.html.twig', array(
        ));
    }
}
