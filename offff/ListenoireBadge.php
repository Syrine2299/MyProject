<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListenoireBadge
 *
 * @ORM\Table(name="listenoire_badge")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\ListenoireBadgeRepository")
 */
class ListenoireBadge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id ;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_suspect", type="string", length=255)
     */
    private $badgeSuspect;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_perdu", type="string", length=255)
     */
    private $badgePerdu;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_anomal", type="string", length=255)
     */
    private $badgeAnomal;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_badge", type="string", length=255)
     */
    private $numBadge;


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
     * Set id
     *
     * @param int $id
     *
     * @return ListenoireBadge
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set badgeSuspect
     *
     * @param string $badgeSuspect
     *
     * @return ListenoireBadge
     */
    public function setBadgeSuspect($badgeSuspect)
    {
        $this->badgeSuspect = $badgeSuspect;

        return $this;
    }

    /**
     * Get badgeSuspect
     *
     * @return string
     */
    public function getBadgeSuspect()
    {
        return $this->badgeSuspect;
    }

    /**
     * Set badgePerdu
     *
     * @param string $badgePerdu
     *
     * @return ListenoireBadge
     */
    public function setBadgePerdu($badgePerdu)
    {
        $this->badgePerdu = $badgePerdu;

        return $this;
    }

    /**
     * Get badgePerdu
     *
     * @return string
     */
    public function getBadgePerdu()
    {
        return $this->badgePerdu;
    }

    /**
     * Set badgeAnomal
     *
     * @param string $badgeAnomal
     *
     * @return ListenoireBadge
     */
    public function setBadgeAnomal($badgeAnomal)
    {
        $this->badgeAnomal = $badgeAnomal;

        return $this;
    }

    /**
     * Get badgeAnomal
     *
     * @return string
     */
    public function getBadgeAnomal()
    {
        return $this->badgeAnomal;
    }

    /**
     * Set numBadge
     *
     * @param string $numBadge
     *
     * @return ListenoireBadge
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
}

