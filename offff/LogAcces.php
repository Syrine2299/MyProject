<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogAcces
 *
 * @ORM\Table(name="log_acces")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\LogAccesRepository")
 */
class LogAcces
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
     * @ORM\Column(name="Heure_entree", type="DateTime")
     */
    private $heureEntree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Heure_sortie", type="DateTime")
     */
    private $heureSortie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_entree", type="DateTime")
     */
    private $dateEntree;

    /**
     * @var \DateTime
     * @ORM\Column(name="Date_sortie", type="DateTime")
     */
    private $dateSortie;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_acces", type="string", length=255)
     */
    private $etatAcces;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_badge", type="string", length=255)
     */
    private $numBadge;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_device", type="string", length=255)
     */
    private $numDevice;


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
     * Set heureEntree
     *
     * @param \DateTime $heureEntree
     *
     * @return LogAcces
     */
    public function setHeureEntree($heureEntree)
    {
        $this->heureEntree = $heureEntree;

        return $this;
    }

    /**
     * Get heureEntree
     *
     * @return \DateTime
     */
    public function getHeureEntree()
    {
        return $this->heureEntree;
    }

    /**
     * Set heureSortie
     *
     * @param \DateTime $heureSortie
     *
     * @return LogAcces
     */
    public function setHeureSortie($heureSortie)
    {
        $this->heureSortie = $heureSortie;

        return $this;
    }

    /**
     * Get heureSortie
     *
     * @return \DateTime
     */
    public function getHeureSortie()
    {
        return $this->heureSortie;
    }

    /**
     * Set dateEntree
     *
     * @param \DateTime $dateEntree
     *
     * @return LogAcces
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
     * @return LogAcces
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
     * Set etatAcces
     *
     * @param string $etatAcces
     *
     * @return LogAcces
     */
    public function setEtatAcces($etatAcces)
    {
        $this->etatAcces = $etatAcces;

        return $this;
    }

    /**
     * Get etatAcces
     *
     * @return string
     */
    public function getEtatAcces()
    {
        return $this->etatAcces;
    }

    /**
     * Set numBadge
     *
     * @param string $numBadge
     *
     * @return LogAcces
     */
    public function setNumBadge($numBadge)
    {
        $this->numBadge = $numBadge;

        return $this;
    }

    /**
     * Get numBadge
     *
     * @return string
     */
    public function getNumBadge()
    {
        return $this->numBadge;
    }

    /**
     * Set numDevice
     *
     * @param string $numDevice
     *
     * @return LogAcces
     */
    public function setNumDevice($numDevice)
    {
        $this->numDevice = $numDevice;

        return $this;
    }

    /**
     * Get numDevice
     *
     * @return string
     */
    public function getNumDevice()
    {
        return $this->numDevice;
    }
}

