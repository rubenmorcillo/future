<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 26/01/2020
 * Time: 0:42
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="soldier_class")
 */
class SoldierClass
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var string
     */private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Skill")
     * @ORM\JoinColumn(nullable=false)
     * @var Skill[]
     */
    private $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return SoldierClass
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
     * @return SoldierClass
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
     * @return SoldierClass
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Skill[]
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param Skill[] $skills
     * @return SoldierClass
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }


    public function __toString()
    {
        return $this->getName();
    }

}