<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 *
 * @ORM\Table(name="sport")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SportRepository")
 */
class Sport
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
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="native_country", type="string", length=255, nullable=true)
     */
    private $nativeCountry;

    /**
     * @var bool
     *
     * @ORM\Column(name="competition", type="boolean")
     */
    private $competition;

    /**
     * @var string
     *
     * @ORM\Column(name="sportswear", type="string", length=500, nullable=true)
     */
    private $sportswear;

    /**
     * @var bool
     *
     * @ORM\Column(name="confirm_admin", type="boolean")
     */
    private $confirmAdmin = 0;


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
     * @return Sport
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
     * @return Sport
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
     * Set nativeCountry
     *
     * @param string $nativeCountry
     *
     * @return Sport
     */
    public function setNativeCountry($nativeCountry)
    {
        $this->nativeCountry = $nativeCountry;

        return $this;
    }

    /**
     * Get nativeCountry
     *
     * @return string
     */
    public function getNativeCountry()
    {
        return $this->nativeCountry;
    }

    /**
     * Set competition
     *
     * @param boolean $competition
     *
     * @return Sport
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Get competition
     *
     * @return bool
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Set sportswear
     *
     * @param string $sportswear
     *
     * @return Sport
     */
    public function setSportswear($sportswear)
    {
        $this->sportswear = $sportswear;

        return $this;
    }

    /**
     * Get sportswear
     *
     * @return string
     */
    public function getSportswear()
    {
        return $this->sportswear;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Sport
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
}
