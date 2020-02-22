<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 22/02/2020
 * Time: 13:32
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="neuroimplant")
 */
class Neuroimplant
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
     * @ORM\Column(type="integer")
     * @var int
     */
    private $agility;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Inventory", inversedBy="neuroimplants")
     * @var Inventory
     */
    private $inventory;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PrincipalCharacter", inversedBy="equipedNeuroimplant")
     * @var User
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
     * @return Neuroimplant
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
     * @return Neuroimplant
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * @param int $agility
     * @return Neuroimplant
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;
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
     * @return Neuroimplant
     */
    public function setValue($value)
    {
        $this->value = $value;
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
     * @return Neuroimplant
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    /**
     * @return User
     */
    public function getEquiped()
    {
        return $this->equiped;
    }

    /**
     * @param User $equiped
     * @return Neuroimplant
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;
        return $this;
    }

}