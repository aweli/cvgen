<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 *
 * @ORM\Table(name="skill")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SkillRepository")
 */
class Skill
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="percentage", type="integer")
     */
    private $percentage;

    /**
     * @ORM\ManyToOne(targetEntity="Candidacy", inversedBy="skills")
     * @ORM\JoinColumn(name="candidacy_id", referencedColumnName="id")
     */
    private $candidacy;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Skill
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set percentage
     *
     * @param integer $percentage
     *
     * @return Skill
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return int
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @return mixed
     */
    public function getCandidacy()
    {
        return $this->candidacy;
    }

    /**
     * @param mixed $candidacy
     */
    public function setCandidacy($candidacy)
    {
        $this->candidacy = $candidacy;
    }

}

