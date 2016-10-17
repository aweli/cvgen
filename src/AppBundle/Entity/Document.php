<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocumentRepository")
 */
class Document
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
     * @ORM\Column(name="company", type="string", length=255,  nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subTitle", type="string", length=255)
     */
    private $subTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text")
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="outro", type="text")
     */
    private $outro;

    /**
     * @var string
     *
     * @ORM\Column(name="footnote", type="text", nullable=true)
     */
    private $footnote;

    /**
     * @var string
     *
     * @ORM\Column(name="imageUrl", type="string", length=255, nullable=true)
     */
    private $imageUrl;

    /**
     * @ORM\OneToOne(targetEntity="Candidacy", inversedBy="document")
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
     * Set company
     *
     * @param string $company
     *
     * @return Document
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
     * Set title
     *
     * @param string $title
     *
     * @return Document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subTitle
     *
     * @param string $subTitle
     *
     * @return Document
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle
     *
     * @return string
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return Document
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Get outro
     *
     * @return string
     */
    public function getOutro()
    {
        return $this->outro;
    }

    /**
     * Set outro
     *
     * @param string $outro
     */
    public function setOutro(string $outro)
    {
        $this->outro = $outro;
    }

    /**
     * Get footnote
     *
     * @return string
     */
    public function getFootnote()
    {
        return $this->footnote;
    }

    /**
     * Set footnote
     *
     * @param string $footnote
     */
    public function setFootnote(string $footnote)
    {
        $this->footnote = $footnote;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Document
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
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

