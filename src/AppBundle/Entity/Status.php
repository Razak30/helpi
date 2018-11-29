<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity
 */
class Status
{
    /**
     * @var string
     *
     * @ORM\Column(name="statusName", type="string", length=50, nullable=true)
     */
    private $statusname;

    /**
     * @var integer
     *
     * @ORM\Column(name="statusId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $statusid;



    /**
     * Set statusname
     *
     * @param string $statusname
     *
     * @return Status
     */
    public function setStatusname($statusname)
    {
        $this->statusname = $statusname;

        return $this;
    }

    /**
     * Get statusname
     *
     * @return string
     */
    public function getStatusname()
    {
        return $this->statusname;
    }

    /**
     * Get statusid
     *
     * @return integer
     */
    public function getStatusid()
    {
        return $this->statusid;
    }
}
