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


class RoomTypeController extends Controller
{

    /**
	* @Route("/roomtypes", name="roomtypes")
	*/
	public function roomtypes()
	{
		$repo = $this->getDoctrine()->getRepository(RoomType::class);
		$roomtypes = $repo->findAll();
		
		return $this->render('roomtype/roomtypes.html.twig', ['roomtypes' => $roomtypes]);
	}

	/**
	* @Route("/roomtype_new", name="new_roomtype")
	*/
	public function newRoomType()
	{
		
		return $this->render('/roomtype/roomtypeadd.html.twig');
	}
    
    /**
    * @Route("/roomtype/{id_roomtype}/edit", name="edit_roomtype")
	*/
	public function editRoom($id_roomtype)
	{

		$repo2 = $this->getDoctrine()->getRepository(RoomType::class);
		$roomtype = $repo2->find($id_roomtype);

		return $this->render('/roomtype/roomtypeadd.html.twig', array( 'roomtype' => $roomtype));
    }


	/**
	* @Route("/saveroomtype", name="roomtype_save")
	*/
	public function saveRoomType(Request $request)
	{

		if($_POST['roomtypeid'] == 0 ){
			$roomtype = new RoomType();
			$new = true;
		}
		else{
			$repo = $this->getDoctrine()->getRepository(RoomType::class);
			$roomtype = $repo->find($_POST['roomtypeid']);
			}
		
		$roomtype->setRoomtypename($_POST['roomtypename']);
		
		$em = $this->getDoctrine()->getManager();
		if ($new){
			$em->persist($roomtype);
			}
		$em->flush();
        
        return $this->redirectToRoute('roomtypes');
	}


    /**
	* @Route("/roomtype/{id_roomtype}/delete", name="delete_roomtype")
	*/
	public function deleteRoomType($id_roomtype)
	{
		$repo = $this->getDoctrine()->getRepository(RoomType::class);
        $roomtype = $repo->find($id_roomtype);
		
		$em = $this->getDoctrine()->getManager();
        $em->remove($roomtype);
        $em->flush();
        $this->addFlash(
            'notice',
            'RoomType successfully deleted!'
        );
		return $this->redirectToRoute('roomtypes');
    }



}