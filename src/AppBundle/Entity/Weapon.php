<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 16/02/2020
 * Time: 22:04
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="weapon")
 */
class Weapon
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
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    private $value;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    private $damage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\WeaponClass")
     * @var WeaponClass
     */
    private $class;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Inventory", inversedBy="weapons")
     * @var Inventory
     */
    private $inventory;


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PrincipalCharacter", inversedBy="equipedWeapon")
     * @ORM\JoinColumn(nullable=true, unique=true)
     * @var PrincipalCharacter
     */
    private $equiped;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Weapon
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Weapon
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Weapon
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Weapon
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     * @return Weapon
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;
        return $this;
    }

    /**
     * @return WeaponClass
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param WeaponClass $class
     * @return Weapon
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return Inventory
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param Inventory $inventory
     * @return Weapon
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEquiped()
    {
        return $this->equiped;
    }

    /**
     * @param mixed $equiped
     * @return Weapon
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;
        return $this;
    }


    public function __toString()
    {
        return $this->getName()." PODER:".$this->getDamage()." // Valor:".$this->getValue();
    }

}