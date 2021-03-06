<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 01/02/2020
 * Time: 18:22
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="principal_character")
 */
class PrincipalCharacter
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $alias;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $experience;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CharacterClass")
     * @var CharacterClass
     */
    private $class;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", inversedBy="principalCharacter")
     * @var User
     */
    private $owner;


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Weapon", mappedBy="equiped")
     * @ORM\JoinColumn(nullable=true)
     * @var Weapon
     */
    private $equipedWeapon;


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Helmet", mappedBy="equiped")
     * @ORM\JoinColumn(nullable=true)
     * @var Helmet
     */
    private $equipedHelmet;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Jacket", mappedBy="equiped")
     * @ORM\JoinColumn(nullable=true)
     * @var Jacket
     */
    private $equipedJacket;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Neuroimplant", mappedBy="equiped")
     * @ORM\JoinColumn(nullable=true)
     * @var Neuroimplant
     */
    private $equipedNeuroimplant;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PrincipalCharacter
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return PrincipalCharacter
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return PrincipalCharacter
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     * @return PrincipalCharacter
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
        return $this;
    }

    /**
     * @return CharacterClass
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param CharacterClass $class
     * @return PrincipalCharacter
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return PrincipalCharacter
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return Weapon
     */
    public function getEquipedWeapon()
    {
        return $this->equipedWeapon;
    }

    /**
     * @param Weapon $equipedWeapon
     * @return PrincipalCharacter
     */
    public function setEquipedWeapon($equipedWeapon)
    {
        $this->equipedWeapon = $equipedWeapon;
        return $this;
    }

    /**
     * @return Helmet
     */
    public function getEquipedHelmet()
    {
        return $this->equipedHelmet;
    }

    /**
     * @param Helmet $equipedHelmet
     * @return PrincipalCharacter
     */
    public function setEquipedHelmet($equipedHelmet)
    {
        $this->equipedHelmet = $equipedHelmet;
        return $this;
    }

    /**
     * @return Jacket
     */
    public function getEquipedJacket()
    {
        return $this->equipedJacket;
    }

    /**
     * @param Jacket $equipedJacket
     * @return PrincipalCharacter
     */
    public function setEquipedJacket($equipedJacket)
    {
        $this->equipedJacket = $equipedJacket;
        return $this;
    }

    /**
     * @return Neuroimplant
     */
    public function getEquipedNeuroimplant()
    {
        return $this->equipedNeuroimplant;
    }

    /**
     * @param Neuroimplant $equipedNeuroimplant
     * @return PrincipalCharacter
     */
    public function setEquipedNeuroimplant($equipedNeuroimplant)
    {
        $this->equipedNeuroimplant = $equipedNeuroimplant;
        return $this;
    }


    public function __toString()
    {
        return $this->getAlias();
    }

}