<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 22/02/2020
 * Time: 12:36
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="jacket")
 */
class Jacket
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
    private $defense;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Inventory", inversedBy="jackets")
     * @var Inventory
     */
    private $inventory;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PrincipalCharacter", inversedBy="equipedJacket")
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
     * @return Jacket
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
     * @return Jacket
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     * @return Jacket
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
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
     * @return Jacket
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
     * @return Jacket
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
     * @return Jacket
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;
        return $this;
    }


}