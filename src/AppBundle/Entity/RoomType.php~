<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoomType
 *
 * @ORM\Table(name="room_type")
 * @ORM\Entity
 */
class RoomType
{
    /**
     * @var string
     *
     * @ORM\Column(name="roomTypeName", type="string", length=255, nullable=true)
     */
    private $roomtypename;

    /**
     * @var integer
     *
     * @ORM\Column(name="roomTypeId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roomtypeid;



    /**
     * Set roomtypename
     *
     * @param string $roomtypename
     *
     * @return RoomType
     */
    public function setRoomtypename($roomtypename)
    {
        $this->roomtypename = $roomtypename;

        return $this;
    }

    /**
     * Get roomtypename
     *
     * @return string
     */
    public function getRoomtypename()
    {
        return $this->roomtypename;
    }

    /**
     * Get roomtypeid
     *
     * @return integer
     */
    public function getRoomtypeid()
    {
        return $this->roomtypeid;
    }
}
