<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultballot
 *
 * @ORM\Table(name="resultballot", indexes={@ORM\Index(name="fk_Result_Ballot_Candidate1_idx", columns={"Candidate_id"})})
 * @ORM\Entity
 */
class Resultballot
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Number_vote", type="integer", nullable=true)
     */
    private $numberVote;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Candidate
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Candidate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Candidate_id", referencedColumnName="id")
     * })
     */
    private $candidate;



    /**
     * Set numberVote
     *
     * @param integer $numberVote
     *
     * @return Resultballot
     */
    public function setNumberVote($numberVote)
    {
        $this->numberVote = $numberVote;

        return $this;
    }

    /**
     * Get numberVote
     *
     * @return integer
     */
    public function getNumberVote()
    {
        return $this->numberVote;
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
     * Set candidate
     *
     * @param \AppBundle\Entity\Candidate $candidate
     *
     * @return Resultballot
     */
    public function setCandidate(\AppBundle\Entity\Candidate $candidate = null)
    {
        $this->candidate = $candidate;

        return $this;
    }

    /**
     * Get candidate
     *
     * @return \AppBundle\Entity\Candidate
     */
    public function getCandidate()
    {
        return $this->candidate;
    }
}
