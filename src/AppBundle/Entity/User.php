<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\AttributeOverride;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *
 * @AttributeOverrides({
 *     @AttributeOverride(name="username",
 *         column=@ORM\Column(
 *             name="username",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="usernameCanonical",
 *         column=@ORM\Column(
 *             name="usernameCanonical",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 * })
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotBlank(message="Veuillez entre votre nom", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=100,
     *     minMessage="Ce nom est trop court.",
     *     maxMessage="Ce nom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     *
     * @Assert\NotBlank(message="Veuillez entre votre prénom", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=100,
     *     minMessage="Ce prénom est trop court.",
     *     maxMessage="Ce prénom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $firstName;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get firstname
     *
     * @return integer
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
 
    /**
     * Set name
     *
     * @param \String $name
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
 
        return $this;
    }
 
    /**
     * Set firstname
     *
     * @param \String $firstName
     * @return string
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
 
        return $this;
    }
    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);
    }
}
