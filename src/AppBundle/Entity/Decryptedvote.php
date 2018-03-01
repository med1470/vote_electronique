<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Decryptedvote
 *
 * @ORM\Table(name="decryptedvote", indexes={@ORM\Index(name="fk_Decryptedvote_Encryptedvote1_idx", columns={"Encryptedvote_id"})})
 * @ORM\Entity
 */
class Decryptedvote
{
    /**
     * @var string
     *
     * @ORM\Column(name="Decrypted value", type="string", length=45, nullable=true)
     */
    private $decryptedValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Encryptedvote
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Encryptedvote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Encryptedvote_id", referencedColumnName="id")
     * })
     */
    private $encryptedvote;



    /**
     * Set decryptedValue
     *
     * @param string $decryptedValue
     *
     * @return Decryptedvote
     */
    public function setDecryptedValue($decryptedValue)
    {
        $this->decryptedValue = $decryptedValue;

        return $this;
    }

    /**
     * Get decryptedValue
     *
     * @return string
     */
    public function getDecryptedValue()
    {
        return $this->decryptedValue;
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
     * Set encryptedvote
     *
     * @param \AppBundle\Entity\Encryptedvote $encryptedvote
     *
     * @return Decryptedvote
     */
    public function setEncryptedvote(\AppBundle\Entity\Encryptedvote $encryptedvote = null)
    {
        $this->encryptedvote = $encryptedvote;

        return $this;
    }

    /**
     * Get encryptedvote
     *
     * @return \AppBundle\Entity\Encryptedvote
     */
    public function getEncryptedvote()
    {
        return $this->encryptedvote;
    }
}
