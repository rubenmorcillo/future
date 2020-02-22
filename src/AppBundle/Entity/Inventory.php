<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 16/02/2020
 * Time: 20:44
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="inventory")
 */
class Inventory
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", mappedBy="inventory")
     * @var User
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $maxCapacity;

    private $currentCapacity;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Weapon", mappedBy="inventory")
     * @var Weapon[]
     */
    private $weapons;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Helmet", mappedBy="inventory")
     * @var Helmet[]
     */
    private $helmets;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Jacket", mappedBy="inventory")
     * @var Jacket[]
     */
    private $jackets;

    public function __construct()
    {
        $this->maxCapacity = 100;
        $this->currentCapacity = 0;
        $this->weapons = new ArrayCollection();
        $this->helmets = new ArrayCollection();
        $this->jackets = new ArrayCollection();
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Inventory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Inventory
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCapacity()
    {
        return $this->maxCapacity;
    }

    /**
     * @param int $maxCapacity
     * @return Inventory
     */
    public function setMaxCapacity($maxCapacity)
    {
        $this->maxCapacity = $maxCapacity;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentCapacity()
    {
        $currentCapacity = 0;
        if (!$this->weapons->isEmpty()){
            $currentCapacity = $this->weapons->count();
        }
        return  $currentCapacity;
    }

    /**
     * @param int $currentCapacity
     * @return Inventory
     */
    public function setCurrentCapacity($currentCapacity)
    {
        $this->currentCapacity = $currentCapacity;
        return $this;
    }

    /**
     * @return Weapon[]
     */
    public function getWeapons()
    {

        return $this->weapons;
    }

    /**
     * @param Weapon[] $weapons
     * @return Inventory
     */
    public function setWeapons($weapons)
    {
        $this->weapons = $weapons;
        return $this;
    }

    /**
     * @return Helmet[]
     */
    public function getHelmets()
    {
        return $this->helmets;
    }

    /**
     * @param Helmet[] $helmets
     * @return Inventory
     */
    public function setHelmets($helmets)
    {
        $this->helmets = $helmets;
        return $this;
    }

    /**
     * @return Jacket[]
     */
    public function getJackets()
    {
        return $this->jackets;
    }

    /**
     * @param Jacket[] $jackets
     * @return Inventory
     */
    public function setJackets($jackets)
    {
        $this->jackets = $jackets;
        return $this;
    }


}