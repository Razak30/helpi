<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use AppBundle\Entity\Hotel;
use AppBundle\Entity\RoomType;
use AppBundle\Entity\InterventionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class InterventionTypeController extends Controller
{

    /**
	* @Route("/interventiontypes", name="interventiontypes")
	*/
	public function interventiontypes()
	{
		$repo = $this->getDoctrine()->getRepository(InterventionType::class);
		$interventiontypes = $repo->findAll();
		
		return $this->render('interventiontype/interventiontypes.html.twig', ['interventiontypes' => $interventiontypes]);
	}

	/**
	* @Route("/interventiontype_new", name="new_interventiontype")
	*/
	public function newInterventionType()
	{
		
		return $this->render('interventiontype/interventiontypeadd.html.twig');
	}
    
    /**
    * @Route("/interventiontype/{id_interventiontype}/edit", name="edit_interventiontype")
	*/
	public function editIntervention($id_interventiontype)
	{

		$repo2 = $this->getDoctrine()->getRepository(InterventionType::class);
		$interventiontype = $repo2->find($id_interventiontype);

		return $this->render('interventiontype/interventiontypeadd.html.twig', array( 'interventiontype' => $interventiontype));
    }


	/**
	* @Route("/saveinterventiontype", name="interventiontype_save")
	*/
	public function saveInterventionType(Request $request)
	{

		if($_POST['interventiontypeid'] == 0 ){
			$interventiontype = new InterventionType();
			$new = true;
		}
		else{
			$repo = $this->getDoctrine()->getRepository(InterventionType::class);
			$interventiontype = $repo->find($_POST['interventiontypeid']);
			}
		
		$interventiontype->setInterventiontypename($_POST['interventiontypename']);
        $interventiontype->setInterventiontypeparentid($_POST['interventiontypeparentid']);

		$em = $this->getDoctrine()->getManager();
		if ($new){
			$em->persist($interventiontype);
			}
		$em->flush();
        
        return $this->redirectToRoute('interventiontypes');
	}


    /**
	* @Route("/interventiontype/{id_interventiontype}/delete", name="delete_interventiontype")
	*/
	public function deleteInterventionType($id_interventiontype)
	{
		$repo = $this->getDoctrine()->getRepository(InterventionType::class);
        $interventiontype = $repo->find($id_interventiontype);
		
		$em = $this->getDoctrine()->getManager();
        $em->remove($interventiontype);
        $em->flush();
        $this->addFlash(
            'notice',
            'InterventionType successfully deleted!'
        );
		return $this->redirectToRoute('interventiontypes');
    }



}