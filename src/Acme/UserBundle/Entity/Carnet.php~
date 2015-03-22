<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carnet
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Carnet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUserCarnet", type="integer")
     */
    private $idUserCarnet;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUserContact", type="integer")
     */
    private $idUserContact;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idUserCarnet
     *
     * @param integer $idUserCarnet
     * @return Carnet
     */
    public function setIdUserCarnet($idUserCarnet)
    {
        $this->idUserCarnet = $idUserCarnet;

        return $this;
    }

    /**
     * Get idUserCarnet
     *
     * @return integer 
     */
    public function getIdUserCarnet()
    {
        return $this->idUserCarnet;
    }

    /**
     * Set idUserContact
     *
     * @param integer $idUserContact
     * @return Carnet
     */
    public function setIdUserContact($idUserContact)
    {
        $this->idUserContact = $idUserContact;

        return $this;
    }

    /**
     * Get idUserContact
     *
     * @return integer 
     */
    public function getIdUserContact()
    {
        return $this->idUserContact;
    }
}
