<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\AffectationRepository")
 */
class Affectation
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date_entree", type="datetime")
     */
    private $dateEntree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_sortie", type="datetime")
     */
    private $dateSortie;

    /**
     * @ORM\ManyToOne(targetEntity="Employe", inversedBy="affectation")
     * @ORM\JoinColumn(name="Employe", referencedColumnName="Id")
     */
    private $employe;

    /**
     * @ORM\ManyToOne(targetEntity="SalleServeur", inversedBy="affectation")
     * @ORM\JoinColumn(name="Salle_serveur", referencedColumnName="Id")
     */
    private $salleServeur;

    /**
     * @var string
     *
     * @ORM\Column(name="background_color", type="string", length=255)
     */
    private $backgroundColor;

    /**
     * @var string
     *
     * @ORM\Column(name="tache", type="string", length=255)
     */
    private $tache;

    /**
     * @var string
     *
     * @ORM\Column(name="border_color", type="string", length=255)
     */
    private $borderColor;

    /**
     * @var string
     *
     * @ORM\Column(name="text_color", type="string", length=255)
     */
    private $textColor;


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
     * Set dateEntree
     *
     * @param \DateTime $dateEntree
     *
     * @return Affectation
     */
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get dateEntree
     *
     * @return \DateTime
     */
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     *
     * @return Affectation
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set employe
     *
     * @param int $employe
     *
     * @return Affectation
     */
    public function setEmploye($employe)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get employe
     *
     * @return int
     */
    public function getEmploye()
    {
        return $this->employe;
    }

    /**
     * Set SalleServeur
     *
     * @param integer $salleServeur
     *
     * @return Affectation
     */
    public function setSalleServeur($salleServeur)
    {
        $this->salleServeur = $salleServeur;

        return $this;
    }

    /**
     * Get salleServeur
     *
     * @return integer
     */
    public function getSalleServeur()
    {
        return $this->salleServeur;
    }

    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     *
     * @return Affectation
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }


    /**
     * Set tache
     *
     * @param string $tache
     *
     * @return Affectation
     */
    public function setTache($tache)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return string
     */
    public function getTache()
    {
        return $this->tache;
    }


    /**
     * Set borderColor
     *
     * @param string $borderColor
     *
     * @return Affectation
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * Get borderColor
     *
     * @return string
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * Set textColor
     *
     * @param string $textColor
     *
     * @return Affectation
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;

        return $this;
    }

    /**
     * Get textColor
     *
     * @return string
     */
    public function getTextColor()
    {
        return $this->textColor;
    }
}

