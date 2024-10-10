<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SalleServeur
 *
 * @ORM\Table(name="salle_serveur")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\SalleServeurRepository")
 */
class SalleServeur
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
     * @ORM\Column(name="Nom_salle_serveur", type="string", length=255, unique=true)
     */
    private $nomSalleServeur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_site", type="string", length=255)
     */
    private $nomSite;

    /**
     * @var int
     *
     * @ORM\Column(name="Num_etage", type="integer")
     */
    private $numEtage;

    /**
     * @var int
     * @ORM\Column(name="HT_READ", type="integer")
     */
    private $htRead;

    /**
     * @ORM\OneToMany(targetEntity="Affectation", mappedBy="salle_serveur")
     */
    private $affectation;

    public function __construct()
    {
        $this->affectation = new ArrayCollection();
    }


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
     * Set nomSalleServeur
     *
     * @param string $nomSalleServeur
     *
     * @return SalleServeur
     */
    public function setNomSalleServeur($nomSalleServeur)
    {
        $this->nomSalleServeur = $nomSalleServeur;

        return $this;
    }

    /**
     * Get nomSalleServeur
     *
     * @return string
     */
    public function getNomSalleServeur()
    {
        return $this->nomSalleServeur;
    }

    /**
     * Set nomSite
     *
     * @param string $nomSite
     *
     * @return SalleServeur
     */
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    /**
     * Get nomSite
     *
     * @return string
     */
    public function getNomSite()
    {
        return $this->nomSite;
    }

    /**
     * Set numEtage
     *
     * @param integer $numEtage
     *
     * @return SalleServeur
     */
    public function setNumEtage($numEtage)
    {
        $this->numEtage = $numEtage;

        return $this;
    }

    /**
     * Get numEtage
     *
     * @return int
     */
    public function getNumEtage()
    {
        return $this->numEtage;
    }

    /**
     * Set htRead
     *
     * @param integer $htRead
     *
     */
    public function setHtRead($htRead)
    {
        $this->htRead = $htRead;

        return $this;
    }

    /**
     * Get htRead
     *
     * @return int
     */
    public function getHtRead()
    {
        return $this->htRead;
    }

    /**
     * @return mixed
     */
    public function getAffectation ()
    {
        return $this->affectation;
    }

    /**
     * @param mixed $affectation
     */
    public function setAffectation ( $affectation )
    {
        $this->affectation = $affectation;
    }

}

