<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterventionType
 *
 * @ORM\Table(name="intervention_type")
 * @ORM\Entity
 */
class InterventionType
{
    /**
     * @var string
     *
     * @ORM\Column(name="interventionTypeName", type="string", length=255, nullable=true)
     */
    private $interventiontypename;

    /**
     * @var integer
     *
     * @ORM\Column(name="interventionTypeParentId", type="integer", nullable=true)
     */
    private $interventiontypeparentid;

    /**
     * @var integer
     *
     * @ORM\Column(name="interventionTypeId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $interventiontypeid;



    /**
     * Set interventiontypename
     *
     * @param string $interventiontypename
     *
     * @return InterventionType
     */
    public function setInterventiontypename($interventiontypename)
    {
        $this->interventiontypename = $interventiontypename;

        return $this;
    }

    /**
     * Get interventiontypename
     *
     * @return string
     */
    public function getInterventiontypename()
    {
        return $this->interventiontypename;
    }

    /**
     * Set interventiontypeparentid
     *
     * @param integer $interventiontypeparentid
     *
     * @return InterventionType
     */
    public function setInterventiontypeparentid($interventiontypeparentid)
    {
        $this->interventiontypeparentid = $interventiontypeparentid;

        return $this;
    }

    /**
     * Get interventiontypeparentid
     *
     * @return integer
     */
    public function getInterventiontypeparentid()
    {
        return $this->interventiontypeparentid;
    }

    /**
     * Get interventiontypeid
     *
     * @return integer
     */
    public function getInterventiontypeid()
    {
        return $this->interventiontypeid;
    }
}
