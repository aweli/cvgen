<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Candidacy
 *
 * @ORM\Table(name="candidacy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CandidacyRepository")
 * @UniqueEntity("identifier")
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
     * @ORM\Column(name="identifier", type="string", length=255, unique=true, nullable=false)
     */
    private $identifier;

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
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", length=255, nullable=true)
     */
    private $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @var Document
     *
     * @ORM\OneToOne(targetEntity="Document", mappedBy="candidacy", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $document;

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
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
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
     * Get skype
     *
     * @return string
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set skype
     *
     * @param string $skype
     */
    public function setSkype(string $skype)
    {
        $this->skype = $skype;
    }

    /**
     * Get github
     *
     * @return string
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set gitbub
     *
     * @param string $github
     */
    public function setGithub(string $github)
    {
        $this->github = $github;
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

    /**
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document $document
     *
     * @return $this
     */
    public function setDocument(Document $document)
    {
        $document->setCandidacy($this);
        $this->document = $document;

        return $this;
    }

}

