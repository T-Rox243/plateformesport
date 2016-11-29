<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Benevoles
 *
 * @ORM\Table(name="benevoles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BenevolesRepository")
 */
class Benevoles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="idEvent", type="string", length=255)
     */
    private $idEvent;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Benevoles
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idEvent
     *
     * @param string $idEvent
     *
     * @return Benevoles
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return string
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }
}
