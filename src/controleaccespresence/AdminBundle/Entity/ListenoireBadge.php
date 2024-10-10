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
     * @ORM\Column(name="Etat", type="string", length=255)
     */
    private $etat;

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
     * Set etat
     *
     * @param string $etat
     *
     * @return ListenoireBadge
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
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

