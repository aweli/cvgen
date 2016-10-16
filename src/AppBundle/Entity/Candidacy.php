<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidacy
 *
 * @ORM\Table(name="candidacy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CandidacyRepository")
 */
class Candidacy
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="personalDescription", type="text", nullable=true)
     */
    private $personalDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", nullable=true)
     */
    private $company;

    /**
     * Enable cascade persist and remove so skills will be persisted and removed automatically when saving Candidacy.
     * OrphanRemoval removes all Skills if the referencing Candidacy is removed from the db.
     *
     * @ORM\OneToMany(targetEntity="Skill", mappedBy="candidacy", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     */
    private $skills;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Candidacy
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
     * @return Candidacy
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
     * Set email
     *
     * @param string $email
     *
     * @return Candidacy
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set personalDescription
     *
     * @param string $personalDescription
     *
     * @return Candidacy
     */
    public function setPersonalDescription($personalDescription)
    {
        $this->personalDescription = $personalDescription;

        return $this;
    }

    /**
     * Get personalDescription
     *
     * @return string
     */
    public function getPersonalDescription()
    {
        return $this->personalDescription;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Candidacy
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add skill
     * @param Skill $skill
     *
     * @return $this
     */
    public function addSkill(Skill $skill)
    {
        $this->skills[] = $skill;

        $skill->setCandidacy($this);

        return $this;
    }

    /**
     * Set skills
     *
     * @param array $skills
     *
     * @return Candidacy
     */
    public function setSkills($skills)
    {
        foreach ($skills as $skill) {
            $this->addSkill($skill);
        }

        return $this;
    }

    /**
     * Get skills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }
}

