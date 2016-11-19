<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediasSport
 *
 * @ORM\Table(name="medias_sport")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediasSportRepository")
 */
class MediasSport
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
     * @ORM\Column(name="idSport", type="integer")
     */
    private $idSport;

    /**
     * @var int
     *
     * @ORM\Column(name="idMedia", type="integer")
     */
    private $idMedia;


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
     * Set idSport
     *
     * @param integer $idSport
     *
     * @return MediasSport
     */
    public function setIdSport($idSport)
    {
        $this->idSport = $idSport;

        return $this;
    }

    /**
     * Get idSport
     *
     * @return int
     */
    public function getIdSport()
    {
        return $this->idSport;
    }

    /**
     * Set idMedia
     *
     * @param integer $idMedia
     *
     * @return MediasSport
     */
    public function setIdMedia($idMedia)
    {
        $this->idMedia = $idMedia;

        return $this;
    }

    /**
     * Get idMedia
     *
     * @return int
     */
    public function getIdMedia()
    {
        return $this->idMedia;
    }
}

