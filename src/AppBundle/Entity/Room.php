<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table(name="room", indexes={@ORM\Index(name="FK_HOTEL_ROOM", columns={"hotelId"}), @ORM\Index(name="FK_ROOM_TYPE_ROOM", columns={"roomTypeId"})})
 * @ORM\Entity
 */
class Room
{
    /**
     * @var integer
     *
     * @ORM\Column(name="roomTypeId", type="integer", nullable=false)
     */
    private $roomtypeid;

    /**
     * @var integer
     *
     * @ORM\Column(name="hotelId", type="integer", nullable=false)
     */
    private $hotelid;

    /**
     * @var string
     *
     * @ORM\Column(name="roomNumber", type="decimal", precision=5, scale=0, nullable=true)
     */
    private $roomnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="roomFloor", type="integer", nullable=true)
     */
    private $roomfloor;

    /**
     * @var integer
     *
     * @ORM\Column(name="roomId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roomid;



    /**
     * Set roomtypeid
     *
     * @param integer $roomtypeid
     *
     * @return Room
     */
    public function setRoomtypeid($roomtypeid)
    {
        $this->roomtypeid = $roomtypeid;

        return $this;
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

    /**
     * Set hotelid
     *
     * @param integer $hotelid
     *
     * @return Room
     */
    public function setHotelid($hotelid)
    {
        $this->hotelid = $hotelid;

        return $this;
    }

    /**
     * Get hotelid
     *
     * @return integer
     */
    public function getHotelid()
    {
        return $this->hotelid;
    }

    /**
     * Set roomnumber
     *
     * @param string $roomnumber
     *
     * @return Room
     */
    public function setRoomnumber($roomnumber)
    {
        $this->roomnumber = $roomnumber;

        return $this;
    }

    /**
     * Get roomnumber
     *
     * @return string
     */
    public function getRoomnumber()
    {
        return $this->roomnumber;
    }

    /**
     * Set roomfloor
     *
     * @param integer $roomfloor
     *
     * @return Room
     */
    public function setRoomfloor($roomfloor)
    {
        $this->roomfloor = $roomfloor;

        return $this;
    }

    /**
     * Get roomfloor
     *
     * @return integer
     */
    public function getRoomfloor()
    {
        return $this->roomfloor;
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
}
