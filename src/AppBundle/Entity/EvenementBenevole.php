<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvenementBenevole
 *
 * @ORM\Table(name="evenement_benevole")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvenementBenevoleRepository")
 */
class EvenementBenevole
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
     * @var string
     *
     * @ORM\Column(name="volunteer_role", type="string", length=255)
     */
    private $volunteerRole;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evenement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenement;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Benevole")
     * @ORM\JoinColumn(nullable=false)
     */
    private $benevole;


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
     * Set volunteerRole
     *
     * @param string $volunteerRole
     *
     * @return EvenementBenevole
     */
    public function setVolunteerRole($volunteerRole)
    {
        $this->volunteerRole = $volunteerRole;

        return $this;
    }

    /**
     * Get volunteerRole
     *
     * @return string
     */
    public function getVolunteerRole()
    {
        return $this->volunteerRole;
    }

    /**
     * Set evenement
     *
     * @param \AppBundle\Entity\Evenement $evenement
     *
     * @return EvenementBenevole
     */
    public function setEvenement(\AppBundle\Entity\Evenement $evenement)
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * Get evenement
     *
     * @return \AppBundle\Entity\Evenement
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * Set benevole
     *
     * @param \AppBundle\Entity\Benevole $benevole
     *
     * @return EvenementBenevole
     */
    public function setBenevole(\AppBundle\Entity\Benevole $benevole)
    {
        $this->benevole = $benevole;

        return $this;
    }

    /**
     * Get benevole
     *
     * @return \AppBundle\Entity\Benevole
     */
    public function getBenevole()
    {
        return $this->benevole;
    }
}
