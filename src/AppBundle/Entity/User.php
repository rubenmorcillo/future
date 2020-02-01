<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 26/01/2020
 * Time: 0:38
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $login;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nickname;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $admin;

    /**
     * @ORM\Column(type="integer")
     * var int
     */
    private $credits;

    /**
     * @ORM\Column(type="integer")
     * var int
     */
    private $cash;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $reputation;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\PrincipalCharacter", mappedBy="owner")
     * @var PrincipalCharacter
     */
    private $principalCharacter;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Soldier", mappedBy="owner")
     * @var Soldier[]
     */
    private $soldiers;

    public function __construct()
    {
        $this->credits = 0;
        $this->cash = 0;
        $this->reputation = 0;
        $this->soldiers = new ArrayCollection();
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
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param mixed $credits
     * @return User
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param mixed $cash
     * @return User
     */
    public function setCash($cash)
    {
        $this->cash = $cash;
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
     * @return User
     */
    public function setReputation($reputation)
    {
        $this->reputation = $reputation;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     * @return User
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
        return $this;
    }


    public function getRoles()
    {
        $roles = ['ROLE_PLAYER'];

        if ($this->isAdmin()){
            $roles[] = 'ROLE_ADMIN';
        }

        return $roles;
    }

    /**
     * @return PrincipalCharacter
     */
    public function getPrincipalCharacter()
    {
        return $this->principalCharacter;
    }

    /**
     * @param PrincipalCharacter $principalCharacter
     * @return User
     */
    public function setPrincipalCharacter($principalCharacter)
    {
        $this->principalCharacter = $principalCharacter;
        return $this;
    }

    /**
     * @return Soldier[]
     */
    public function getSoldiers()
    {
        return $this->soldiers;
    }

    /**
     * @param Soldier[] $soldiers
     * @return User
     */
    public function setSoldiers($soldiers)
    {
        $this->soldiers = $soldiers;
        return $this;
    }


    public function getSalt()
    {
    }

    public function getUsername()
    {
        $this->getLogin();
    }

    public function eraseCredentials()
    {
    }

    public function __toString()
    {
        return $this->getNickname();
    }

}