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
     * @ORM\Column(name="opening_time", type="string", length=255, nullable=true)
     */
    private $openingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="closing_time", type="string", length=255, nullable=true)
     */
    private $closingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=999)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="link_website", type="string", length=255, nullable=true)
     */
    private $linkWebsite;

    /**
     * @var string
     *
     * @ORM\Column(name="link_fede", type="string", length=255, nullable=true)
     */
    private $linkFede;

    /**
     * @var string
     *
     * @ORM\Column(name="email_contact", type="string", length=255, nullable=true)
     */
    private $emailContact;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_contact", type="string", length=255, nullable=true)
     */
    private $phoneContact;

    /**
     * @var string
     *
     * @ORM\Column(name="sport_complex", type="string", length=500, nullable=true)
     */
    private $sportComplex;

    /**
     * @var string
     *
     * @ORM\Column(name="sport_complex_city", type="string", length=500, nullable=true)
     */
    private $sportComplexCity;

    /**
     * @var bool
     *
     * @ORM\Column(name="confirm_admin", type="boolean")
     */
    private $confirmAdmin = 0;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sport")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sport;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Adresse", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Media", cascade={"persist"})
     */
    private $medias;

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
     * Set openingTime
     *
     * @param string $openingTime
     *
     * @return Club
     */
    public function setOpeningTime($openingTime)
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    /**
     * Get openingTime
     *
     * @return string
     */
    public function getOpeningTime()
    {
        return $this->openingTime;
    }

    /**
     * Set closingTime
     *
     * @param string $closingTime
     *
     * @return Club
     */
    public function setClosingTime($closingTime)
    {
        $this->closingTime = $closingTime;

        return $this;
    }

    /**
     * Get closingTime
     *
     * @return string
     */
    public function getClosingTime()
    {
        return $this->closingTime;
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

    /**
     * Set emailContact
     *
     * @param string $emailContact
     *
     * @return Club
     */
    public function setEmailContact($emailContact)
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    /**
     * Get emailContact
     *
     * @return string
     */
    public function getEmailContact()
    {
        return $this->emailContact;
    }

    /**
     * Set phoneContact
     *
     * @param string $phoneContact
     *
     * @return Club
     */
    public function setPhoneContact($phoneContact)
    {
        $this->phoneContact = $phoneContact;

        return $this;
    }

    /**
     * Get phoneContact
     *
     * @return string
     */
    public function getPhoneContact()
    {
        return $this->phoneContact;
    }

    /**
     * Set sportComplex
     *
     * @param string $sportComplex
     *
     * @return Club
     */
    public function setSportComplex($sportComplex)
    {
        $this->sportComplex = $sportComplex;

        return $this;
    }

    /**
     * Get sportComplex
     *
     * @return string
     */
    public function getSportComplex()
    {
        return $this->sportComplex;
    }

    /**
     * Set sportComplexCity
     *
     * @param string $sportComplexCity
     *
     * @return Club
     */
    public function setSportComplexCity($sportComplexCity)
    {
        $this->sportComplexCity = $sportComplexCity;

        return $this;
    }

    /**
     * Get sportComplexCity
     *
     * @return string
     */
    public function getSportComplexCity()
    {
        return $this->sportComplexCity;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sport
     *
     * @param \AppBundle\Entity\Sport $sport
     *
     * @return Club
     */
    public function setSport(\AppBundle\Entity\Sport $sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sport
     *
     * @return \AppBundle\Entity\Sport
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set adresse
     *
     * @param \AppBundle\Entity\Adresse $adresse
     *
     * @return Club
     */
    public function setAdresse(\AppBundle\Entity\Adresse $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Add media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Club
     */
    public function addMedia(\AppBundle\Entity\Media $media)
    {
        $this->medias[] = $media;

        return $this;
    }

    /**
     * Remove media
     *
     * @param \AppBundle\Entity\Media $media
     */
    public function removeMedia(\AppBundle\Entity\Media $media)
    {
        $this->medias->removeElement($media);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Club
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set confirmAdmin
     *
     * @param boolean $confirmAdmin
     *
     * @return Club
     */
    public function setConfirmAdmin($confirmAdmin)
    {
        $this->confirmAdmin = $confirmAdmin;

        return $this;
    }

    /**
     * Get confirmAdmin
     *
     * @return boolean
     */
    public function getConfirmAdmin()
    {
        return $this->confirmAdmin;
    }
}
