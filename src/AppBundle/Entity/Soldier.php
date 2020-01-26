<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 26/01/2020
 * Time: 0:43
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="soldier")
 */
class Soldier
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $alias;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SoldierClass")
     * @ORM\JoinColumn(nullable=false)
     * @var SoldierClass
     */
    private $class;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     * @var User
     */
    private $owner;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Soldier
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
     * @return Soldier
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return SoldierClass
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param SoldierClass $class
     * @return Soldier
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function __toString()
    {
        return $this->getAlias();
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
     * @return Soldier
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }


}