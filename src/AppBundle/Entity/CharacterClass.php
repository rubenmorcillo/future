<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 01/02/2020
 * Time: 18:21
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="character_class")
 */
class CharacterClass
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
    private $hpBase;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $damageBase;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $defenseBase;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $agilityBase;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $image;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CharacterClass
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
     * @return CharacterClass
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
     * @return CharacterClass
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getHpBase()
    {
        return $this->hpBase;
    }

    /**
     * @param int $hpBase
     * @return CharacterClass
     */
    public function setHpBase($hpBase)
    {
        $this->hpBase = $hpBase;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamageBase()
    {
        return $this->damageBase;
    }

    /**
     * @param int $damageBase
     * @return CharacterClass
     */
    public function setDamageBase($damageBase)
    {
        $this->damageBase = $damageBase;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefenseBase()
    {
        return $this->defenseBase;
    }

    /**
     * @param int $defenseBase
     * @return CharacterClass
     */
    public function setDefenseBase($defenseBase)
    {
        $this->defenseBase = $defenseBase;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgilityBase()
    {
        return $this->agilityBase;
    }

    /**
     * @param int $agilityBase
     * @return CharacterClass
     */
    public function setAgilityBase($agilityBase)
    {
        $this->agilityBase = $agilityBase;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }


}