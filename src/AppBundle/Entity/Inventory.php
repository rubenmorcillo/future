<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 16/02/2020
 * Time: 20:44
 */

namespace AppBundle\Entity;


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

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $currentCapacity;

    public function __construct()
    {
        $this->maxCapacity = 100;
        $this->currentCapacity = 0;
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
        return $this->currentCapacity;
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

}