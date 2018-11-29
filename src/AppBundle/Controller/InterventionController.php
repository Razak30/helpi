<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Intervention;
use AppBundle\Entity\Room;
use AppBundle\Entity\Status;
use AppBundle\Entity\InterventionType;
use AppBundle\Entity\RoomType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class InterventionController extends Controller
{
	/**
	* @Route("/interventionsAdmin", name="interventionsAdmin")
	*/
	public function interventionsAdmin()
	{

		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$interventions = $repo->findAll();

		return $this->render('/intervention/admin/interventionsAdmin.html.twig', ['interventions' => $interventions]);
	}

	/**
	* @Route("/interventionsManager", name="interventionsManager")
	*/
	public function interventionsManager()
	{

		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$interventions = $repo->findAllNonArchive();

		return $this->render('/intervention/manager/interventionsManager.html.twig', ['interventions' => $interventions]);
	}

	/**
	* @Route("/interventionsUser", name="interventionsUser")
	*/
	public function interventionsUser()
	{

		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$interventions = $repo->findAllNonArchive();

		return $this->render('/intervention/user/interventionsUser.html.twig', ['interventions' => $interventions]);
	}
	
	/**
	* @Route("/intervention/{id_intervention}", name="intervention_detail")
	*/
	public function intervention($id_intervention)
	{
		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$intervention = $repo->find($id_intervention);
		
		return $this->render('/intervention/interventiondetail.html.twig', ['intervention' => $intervention]);
    }
    
    /**
	* @Route("/intervention/{id_intervention}/edit", name="edit_intervention")
	*/
	public function editIntervention($id_intervention)
	{
		
		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$intervention = $repo->find($id_intervention);
		
		$repo4 = $this->getDoctrine()->getRepository(Status::class);
		$status = $repo4->findAll();	

		$repo2 = $this->getDoctrine()->getRepository(Room::class);
		$rooms = $repo2->findAll();
		
		$repo3 = $this->getDoctrine()->getRepository(InterventionType::class);
		$interventionTypes = $repo3->findAll();

		return $this->render('/intervention/interventionadd.html.twig', array('status' => $status, 'rooms' => $rooms, 'interventionTypes' => $interventionTypes, 'intervention' => $intervention));
    }
    
    /**
	* @Route("/intervention_new", name="new_intervention")
	*/
	public function newIntervention()
	{
		$repo = $this->getDoctrine()->getRepository(Status::class);
		$status = $repo->findAll();	

		$repo2 = $this->getDoctrine()->getRepository(Room::class);
		$rooms = $repo2->findAll();
		
		$repo3 = $this->getDoctrine()->getRepository(InterventionType::class);
		$interventionTypes = $repo3->findAll();

		return $this->render('/intervention/interventionadd.html.twig', array('status' => $status, 'rooms' => $rooms, 'interventionTypes' => $interventionTypes));
    }

    /**
	* @Route("/intervention/{id_intervention}/delete", name="delete_intervention")
	*/
	public function deleteIntervention($id_intervention)
	{
		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$intervention = $repo->find($id_intervention);
		
		$em = $this->getDoctrine()->getManager();
        $em->remove($intervention);
        $em->flush();
        $this->addFlash(
            'notice',
            'Intervention successfully deleted!'
        );
		return $this->redirectToRoute('interventionsAdmin');
		
	}
	
	/**
	* @Route("/saveintervention", name="intervention_save")
	*/
	public function saveIntervention(Request $request)
	{

		
		if($_POST['interventionid']== 0){
			$intervention = new Intervention();
			$new = true;
		}
		else{
			$repo = $this->getDoctrine()->getRepository(Intervention::class);
			$intervention = $repo->find($_POST['interventionid']);
			}
		$dateADD = new \DateTime("now");
		$dateClose = new\DateTime("now");
		$dateClose->Modify( '+3 month' );
		$intervention->setUserid(2);
		$intervention->setInterventiontypeid($_POST['interventionType']);
		$intervention->setRoomid($_POST['room_id']);
		$intervention->setStatusid($_POST['status_id']);
		$intervention->setInterventionname($_POST['name']);
		$intervention->setInterventioncomplement($_POST['complement']);
		$intervention->setInterventionphotoIncident($_POST['photo']);
		$intervention->setInterventiondatecreate($dateADD);
		$intervention->setInterventiondateclose($dateClose);
		

		$em = $this->getDoctrine()->getManager();
		if ($new){
			$em->persist($intervention);
			}
		$em->flush();

		var_dump($intervention);
		exit;
		
		
	}

	/**
	* @Route("/intervention_edit_status/{id_intervention}", name="intervention_edit_status")
	*/
	public function interventionEditStatus($id_intervention)
	{
		
		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$intervention = $repo->find($id_intervention);
		
		$repo4 = $this->getDoctrine()->getRepository(Status::class);
		$status = $repo4->findAll();	

		return $this->render('/intervention/manager/interventionEditStatus.html.twig', array('status' => $status, 'intervention' => $intervention));
	}
	
	/**
	* @Route("/intervention_save_status/{id_intervention}/{id_status}", name="intervention_save_status")
	*/
	public function interventionSaveStatus($id_intervention, $id_status, Request $request)
	{
		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$intervention = $repo->find($id_intervention);

		if (isset($_POST['complement']))
		{
			$intervention->setInterventioncomplement($_POST['complement']);
		}
		if (isset($_POST['typeCloture']))
		{
			$id_status = $_POST['typeCloture'];
			var_dump($id_status);
		}

		$intervention->setStatusid($id_status);
		$em = $this->getDoctrine()->getManager();
		$em->flush();

		return $this->redirectToRoute('interventionsManager');
	}
	
	/**
	* @Route("/intervention_close/{id_intervention}", name="intervention_close")
	*/
	public function interventionClose($id_intervention)
	{
		
		$repo = $this->getDoctrine()->getRepository(Intervention::class);
		$intervention = $repo->find($id_intervention);

		$roomid = $intervention->getRoomid();

		$repo1 = $this->getDoctrine()->getRepository(Room::class);
		$room = $repo1->find($roomid);

		$roomtypeid = $room->getRoomtypeid();

		$repo2 = $this->getDoctrine()->getRepository(RoomType::class);
		$roomtype = $repo2->find($roomtypeid);

		return $this->render('intervention/manager/interventionClose.html.twig', array('intervention' => $intervention, 'room' => $room, 'roomtype' => $roomtype));
	}
	
	/**
	* @Route("/interventiontestrepo", name="interventiontestrepo")
	*/
	public function interventiontestrepo()
	{
		$repository = $this->getDoctrine()
		->getEntityManager()
		->getRepository(Intervention::class);
		echo 'le repository courant est '.get_class($repository);exit;
	}
}