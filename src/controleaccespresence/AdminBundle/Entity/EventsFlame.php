<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventsFlame
 *
 * @ORM\Table(name="log_h_t")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\EventsFlameRepository")
 */
class EventsFlame
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
     * @ORM\Column(name="Date_event", type="DateTime")
     */
    private $dateEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_flame", type="string", length=255)
     */
    private $etatFlame;


    /**
     * @var string
     *
     * @ORM\Column(name="Nom_device", type="string", length=255)
     */
    private $nomDevice;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_salle_serveur", type="string", length=255)
     */
    private $nomSalleServeur;


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
     * Set dateEvent
     *
     * @param \DateTime $dateEvent
     *
     * @return EventsFlame
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    /**
     * Get dateEvent
     *
     * @return \DateTime
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Set nomDevice
     *
     * @param string $nomDevice
     *
     * @return EventsFlame
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
     * Get etatFlame
     *
     * @return string
     */
    public function getEtatFlame()
    {
        return $this->etatFlame;
    }

    /**
     * Set etatFlame
     *
     * @param string $etatFlame
     *
     * @return EventsFlame
     */
    public function setEtatFlame($etatFlame)
    {
        $this->etatFlame = $etatFlame;

        return $this;
    }

    /**
     * Set nomSalleServeur
     *
     * @param string nomSalleServeur
     *
     * @return EventsFlame
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


}

