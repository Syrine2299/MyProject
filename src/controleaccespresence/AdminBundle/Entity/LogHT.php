<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogHT
 *
 * @ORM\Table(name="log_h_t")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\LogHTRepository")
 */
class LogHT
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
     * @ORM\Column(name="Date_HT", type="DateTime")
     */
    private $dateHt;

    /**
     * @var string
     *
     * @ORM\Column(name="Temperature", type="string", length=255)
     */
    private $temperature;

    /**
     * @var string
     *
     * @ORM\Column(name="Humidite", type="string", length=255)
     */
    private $humidite;


    /**
     * @var string
     *
     * @ORM\Column(name="Nom_device", type="string", length=255)
     */
    private $nomDevice;

    /**
     * @ORM\ManyToOne(targetEntity="SalleServeur", inversedBy="loght")
     * @ORM\JoinColumn(name="Salle_serveur", referencedColumnName="Id")
     */
    private $salleServeur;


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
     * Set dateHt
     *
     * @param \DateTime $dateHt
     *
     * @return LogHt
     */
    public function setDateHt($dateHt)
    {
        $this->dateHt = $dateHt;

        return $this;
    }

    /**
     * Get dateHt
     *
     * @return \DateTime
     */
    public function getDateHt()
    {
        return $this->dateHt;
    }

    /**
     * Set nomDevice
     *
     * @param string $nomDevice
     *
     * @return LogHT
     */
    public function setNomDevice($nomDevice)
    {
        $this->nomDevice = $nomDevice;

        return $this;
    }

    /**
     * Get nomDevice
     *
     * @return string
     */
    public function getNomDevice()
    {
        return $this->nomDevice;
    }


    /**
     * Get temperature
     *
     * @return string
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set temperature
     *
     * @param string $temperature
     *
     * @return LogHT
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }


    /**
     * Get humidite
     *
     * @return string
     */
    public function getHumidite()
    {
        return $this->humidite;
    }

    /**
     * Set humidite
     *
     * @param string $humidite
     *
     * @return LogHT
     */
    public function setHumidite($humidite)
    {
        $this->humidite = $humidite;

        return $this;
    }


    /**
     * Set salleServeur
     *
     * @param string salleServeur
     *
     * @return LogHT
     */
    public function setSalleServeur($salleServeur)
    {
        $this->salleServeur = $salleServeur;

        return $this;
    }

    /**
     * Get salleServeur
     *
     * @return string
     */
    public function getSalleServeur()
    {
        return $this->salleServeur;
    }


}

