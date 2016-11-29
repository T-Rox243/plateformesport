<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClubRepository")
 */
class Club
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="horaires", type="string", length=255)
     */
    private $horaires;

    /**
     * @var string
     *
     * @ORM\Column(name="link_website", type="string", length=255)
     */
    private $linkWebsite;

    /**
     * @var string
     *
     * @ORM\Column(name="link_fede", type="string", length=255)
     */
    private $linkFede;


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
     * Set name
     *
     * @param string $name
     *
     * @return Club
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Club
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set horaires
     *
     * @param string $horaires
     *
     * @return Club
     */
    public function setHoraires($horaires)
    {
        $this->horaires = $horaires;

        return $this;
    }

    /**
     * Get horaires
     *
     * @return string
     */
    public function getHoraires()
    {
        return $this->horaires;
    }

    /**
     * Set linkWebsite
     *
     * @param string $linkWebsite
     *
     * @return Club
     */
    public function setLinkWebsite($linkWebsite)
    {
        $this->linkWebsite = $linkWebsite;

        return $this;
    }

    /**
     * Get linkWebsite
     *
     * @return string
     */
    public function getLinkWebsite()
    {
        return $this->linkWebsite;
    }

    /**
     * Set linkFede
     *
     * @param string $linkFede
     *
     * @return Club
     */
    public function setLinkFede($linkFede)
    {
        $this->linkFede = $linkFede;

        return $this;
    }

    /**
     * Get linkFede
     *
     * @return string
     */
    public function getLinkFede()
    {
        return $this->linkFede;
    }
}
