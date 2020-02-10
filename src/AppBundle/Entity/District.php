<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 09/02/2020
 * Time: 21:12
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="district")
 */
class District
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $number;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;


    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $reputation;


    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $shape;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return District
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return District
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
     * @return District
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getReputation()
    {
        return $this->reputation;
    }

    /**
     * @param int $reputation
     * @return District
     */
    public function setReputation($reputation)
    {
        $this->reputation = $reputation;
        return $this;
    }

    /**
     * @return string
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @param string $shape
     * @return District
     */
    public function setShape($shape)
    {
        $this->shape = $shape;
        return $this;
    }

    public function __toString()
    {
        return $this->getNumber()." -> ".$this->getName();
    }

}