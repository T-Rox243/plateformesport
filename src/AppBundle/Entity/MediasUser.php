<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediasUser
 *
 * @ORM\Table(name="medias_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediasUserRepository")
 */
class MediasUser
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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return MediasUser
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
     * Set idMedia
     *
     * @param integer $idMedia
     *
     * @return MediasUser
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
