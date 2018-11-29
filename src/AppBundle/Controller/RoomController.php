<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use AppBundle\Entity\Hotel;
use AppBundle\Entity\RoomType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RoomController extends Controller
{
	/**
	* @Route("/rooms", name="rooms")
	*/
	public function rooms()
	{
		$repo = $this->getDoctrine()->getRepository(Room::class);
		$rooms = $repo->findAll();
		
		return $this->render('room/rooms.html.twig', ['rooms' => $rooms]);
	}
	
	/**
	* @Route("/room/{id_room}", name="room_detail")
	*/
	public function room($id_room)
	{
		$repo = $this->getDoctrine()->getRepository(Room::class);
		$room = $repo->find($id_room);
		
		return $this->render('room/roomdetail.html.twig', ['room' => $room]);
    }
    
    /**
    * @Route("/room/{id_room}/edit", name="edit_room")
	*/
	public function editRoom($id_room)
	{

		$repo = $this->getDoctrine()->getRepository(Room::class);
		$room = $repo->find($id_room);

		$repo3 = $this->getDoctrine()->getRepository(Hotel::class);
		$hotels = $repo3->findAll();

		$repo2 = $this->getDoctrine()->getRepository(RoomType::class);
		$roomTypes = $repo2->findAll();

		return $this->render('/room/roomadd.html.twig', array('hotels' => $hotels, 'roomTypes' => $roomTypes, 'room' => $room));
    }
    
    /**
	* @Route("/room_new", name="new_room")
	*/
	public function newRoom()
	{
		$repo = $this->getDoctrine()->getRepository(Hotel::class);
		$hotels = $repo->findAll();	

		$repo2 = $this->getDoctrine()->getRepository(RoomType::class);
		$roomTypes = $repo2->findAll();

		return $this->render('/room/roomadd.html.twig', array('hotels' => $hotels, 'roomTypes' => $roomTypes));
    }

    /**
	* @Route("/room/{id_room}/delete", name="delete_room")
	*/
	public function deleteRoom($id_room)
	{
		$repo = $this->getDoctrine()->getRepository(Room::class);
		$room = $repo->find($id_room);
		
		$em = $this->getDoctrine()->getManager();
        $em->remove($room);
        $em->flush();
        $this->addFlash(
            'notice',
            'Room successfully deleted!'
        );
		return $this->redirectToRoute('rooms');
    }
	

	/**
	* @Route("/saveroom", name="room_save")
	*/
	public function saveRoom(Request $request)
	{

		if($_POST['roomid'] == 0 ){
			$room = new Room();
			$new = true;
		}
		else{
			$repo = $this->getDoctrine()->getRepository(Room::class);
			$room = $repo->find($_POST['roomid']);
			}
		
		$room->setRoomtypeid($_POST['roomType']);
		$room->setHotelid($_POST['hotel_id']);
		$room->setRoomnumber($_POST['roomnumber']);
		$room->setRoomfloor($_POST['roomfloor']);

		$em = $this->getDoctrine()->getManager();
		if ($new){
			$em->persist($room);
			}
		$em->flush();

		var_dump($room);
		exit;		
	}


}