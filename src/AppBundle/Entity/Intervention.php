<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 *
 * @ORM\Table(name="intervention", indexes={@ORM\Index(name="FK_USER_INTERVENTION", columns={"userId"}), @ORM\Index(name="FK_INTERVENTION_TYPE_INTERVENTION", columns={"interventionTypeId"}), @ORM\Index(name="FK_ROOM_INTERVENTION", columns={"roomId"}), @ORM\Index(name="FK_STATUS_INTERVENTION", columns={"statusId"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InterventionRepository")
 */
class Intervention
{
    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="interventionTypeId", type="integer", nullable=false)
     */
    private $interventiontypeid;

    /**
     * @var integer
     *
     * @ORM\Column(name="roomId", type="integer", nullable=false)
     */
    private $roomid;

    /**
     * @var integer
     *
     * @ORM\Column(name="statusId", type="integer", nullable=true)
     */
    private $statusid;

    /**
     * @var string
     *
     * @ORM\Column(name="interventionName", type="string", length=255, nullable=true)
     */
    private $interventionname;

    /**
     * @var string
     *
     * @ORM\Column(name="interventionComplement", type="text", length=65535, nullable=true)
     */
    private $interventioncomplement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="interventionDateCreate", type="date", nullable=true)
     */
    private $interventiondatecreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="interventionDateClose", type="date", nullable=true)
     */
    private $interventiondateclose;

    /**
     * @var string
     *
     * @ORM\Column(name="interventionPhoto_Incident", type="string", length=255, nullable=true)
     */
    private $interventionphotoIncident;

    /**
     * @var integer
     *
     * @ORM\Column(name="interventionId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $interventionid;



    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return Intervention
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set interventiontypeid
     *
     * @param integer $interventiontypeid
     *
     * @return Intervention
     */
    public function setInterventiontypeid($interventiontypeid)
    {
        $this->interventiontypeid = $interventiontypeid;

        return $this;
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

    /**
     * Set roomid
     *
     * @param integer $roomid
     *
     * @return Intervention
     */
    public function setRoomid($roomid)
    {
        $this->roomid = $roomid;

        return $this;
    }

    /**
     * Get roomid
     *
     * @return integer
     */
    public function getRoomid()
    {
        return $this->roomid;
    }

    /**
     * Set statusid
     *
     * @param integer $statusid
     *
     * @return Intervention
     */
    public function setStatusid($statusid)
    {
        $this->statusid = $statusid;

        return $this;
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

    /**
     * Set interventionname
     *
     * @param string $interventionname
     *
     * @return Intervention
     */
    public function setInterventionname($interventionname)
    {
        $this->interventionname = $interventionname;

        return $this;
    }

    /**
     * Get interventionname
     *
     * @return string
     */
    public function getInterventionname()
    {
        return $this->interventionname;
    }

    /**
     * Set interventioncomplement
     *
     * @param string $interventioncomplement
     *
     * @return Intervention
     */
    public function setInterventioncomplement($interventioncomplement)
    {
        $this->interventioncomplement = $interventioncomplement;

        return $this;
    }

    /**
     * Get interventioncomplement
     *
     * @return string
     */
    public function getInterventioncomplement()
    {
        return $this->interventioncomplement;
    }

    /**
     * Set interventiondatecreate
     *
     * @param \DateTime $interventiondatecreate
     *
     * @return Intervention
     */
    public function setInterventiondatecreate($interventiondatecreate)
    {
        $this->interventiondatecreate = $interventiondatecreate;

        return $this;
    }

    /**
     * Get interventiondatecreate
     *
     * @return \DateTime
     */
    public function getInterventiondatecreate()
    {
        return $this->interventiondatecreate;
    }

    /**
     * Set interventiondateclose
     *
     * @param \DateTime $interventiondateclose
     *
     * @return Intervention
     */
    public function setInterventiondateclose($interventiondateclose)
    {
        $this->interventiondateclose = $interventiondateclose;

        return $this;
    }

    /**
     * Get interventiondateclose
     *
     * @return \DateTime
     */
    public function getInterventiondateclose()
    {
        return $this->interventiondateclose;
    }

    /**
     * Set interventionphotoIncident
     *
     * @param string $interventionphotoIncident
     *
     * @return Intervention
     */
    public function setInterventionphotoIncident($interventionphotoIncident)
    {
        $this->interventionphotoIncident = $interventionphotoIncident;

        return $this;
    }

    /**
     * Get interventionphotoIncident
     *
     * @return string
     */
    public function getInterventionphotoIncident()
    {
        return $this->interventionphotoIncident;
    }

    /**
     * Get interventionid
     *
     * @return integer
     */
    public function getInterventionid()
    {
        return $this->interventionid;
    }
}
