<?php

namespace controleaccespresence\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Badge
 *
 * @ORM\Table(name="badge")
 * @ORM\Entity(repositoryClass="controleaccespresence\AdminBundle\Repository\BadgeRepository")
 */
class Badge
{

    /**
     * @var string
     *
     * @ORM\Column(name="Num_badge", type="string", length=255)
     */
    private $numBadge;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_badge", type="string", length=255)
     */
    private $typeBadge;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_badge", type="string", length=255)
     */
    private $etatBadge;


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
     * Set numBadge
     *
     * @param string $numBadge
     *
     * @return Badge
     */
    public function setNumBadge($numBadge)
    {
        $this->numBadge = $numBadge;

        return $this;
    }

    public function __toString()
    {
        return $this->numBadge;
    }

    /**
     * Set typeBadge
     *
     * @param string $typeBadge
     *
     * @return Badge
     */
    public function setTypeBadge($typeBadge)
    {
        $this->typeBadge = $typeBadge;

        return $this;
    }

    /**
     * Get typeBadge
     *
     * @return string
     */
    public function getTypeBadge()
    {
        return $this->typeBadge;
    }

    /**
     * Set etatBadge
     *
     * @param string $etatBadge
     *
     * @return Badge
     */
    public function setEtatBadge($etatBadge)
    {
        $this->etatBadge = $etatBadge;

        return $this;
    }

    /**
     * Get etatBadge
     *
     * @return string
     */
    public function getEtatBadge()
    {
        return $this->etatBadge;
    }
}

