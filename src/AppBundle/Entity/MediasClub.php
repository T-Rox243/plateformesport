<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediasClub
 *
 * @ORM\Table(name="medias_club")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediasClubRepository")
 */
class MediasClub
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
     * @ORM\Column(name="idClub", type="integer")
     */
    private $idClub;

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
     * Set idClub
     *
     * @param integer $idClub
     *
     * @return MediasClub
     */
    public function setIdClub($idClub)
    {
        $this->idClub = $idClub;

        return $this;
    }

    /**
     * Get idClub
     *
     * @return int
     */
    public function getIdClub()
    {
        return $this->idClub;
    }

    /**
     * Set idMedia
     *
     * @param integer $idMedia
     *
     * @return MediasClub
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

