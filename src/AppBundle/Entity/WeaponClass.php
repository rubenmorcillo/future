<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 16/02/2020
 * Time: 22:10
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="weapon_class")
 */
class WeaponClass
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
    private $literal;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return WeaponClass
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiteral()
    {
        return $this->literal;
    }

    /**
     * @param string $literal
     * @return WeaponClass
     */
    public function setLiteral($literal)
    {
        $this->literal = $literal;
        return $this;
    }

    public function __toString()
    {
        return $this->getLiteral();
    }


}