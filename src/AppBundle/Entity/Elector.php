<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Elector
 *
 * @ORM\Table(name="elector", indexes={@ORM\Index(name="fk_Elector_Ballot1_idx", columns={"Ballot_id"})})
 * @ORM\Entity
 */
class Elector
{
    /**
     * @var string
     *
     * @ORM\Column(name="First_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="Last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=45, nullable=true)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="NatNum", type="integer", nullable=true)
     */
    private $natnum;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Method", type="boolean", nullable=true)
     */
    private $method;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Ballot
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ballot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ballot_id", referencedColumnName="id")
     * })
     */
    private $ballot;



    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Elector
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Elector
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Elector
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set natnum
     *
     * @param integer $natnum
     *
     * @return Elector
     */
    public function setNatnum($natnum)
    {
        $this->natnum = $natnum;

        return $this;
    }

    /**
     * Get natnum
     *
     * @return integer
     */
    public function getNatnum()
    {
        return $this->natnum;
    }

    /**
     * Set method
     *
     * @param boolean $method
     *
     * @return Elector
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return boolean
     */
    public function getMethod()
    {
        return $this->method;
    }

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
     * Set ballot
     *
     * @param \AppBundle\Entity\Ballot $ballot
     *
     * @return Elector
     */
    public function setBallot(\AppBundle\Entity\Ballot $ballot = null)
    {
        $this->ballot = $ballot;

        return $this;
    }

    /**
     * Get ballot
     *
     * @return \AppBundle\Entity\Ballot
     */
    public function getBallot()
    {
        return $this->ballot;
    }
}
