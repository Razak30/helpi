<?php
// src/AppBundle/Controller/HotelController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Hotel;
use AppBundle\Form\HotelType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class HotelController extends Controller
{
	/**
	* @Route("/hotels", name="hotels")
	*/
	public function indexAction()
	{
		$request = Request::createFromGlobals();
		// the URI being requested (e.g. /about) minus any query parameters
		// var_dump($request->getPathInfo());
		// // retrieves $_GET and $_POST variables respectively
		// var_dump($request->query->get('id'));exit;
		
		
		
		// reponse sans twig
		// return new Response('<html><body>ma reponse</body></html>');
		
		// reponse avec twig
		//$test_var = 'toto';
		// return $this->render('hotel/hotels.html.twig', array(
		// 'test_var' => $test_var,
		// ));
		
		//test requete SQL dans controller ;-(  
		// $em = $this->getDoctrine()->getManager();
		// $RAW_QUERY = 'SELECT * FROM hotel';
		// $statement = $em->getConnection()->prepare($RAW_QUERY);
		// $statement->bindValue('status', 1);
		// $statement->execute();
		// $result = $statement->fetchAll();
		// var_dump($result);exit;
		
		//verif repo courant
		// $repository = $this->getDoctrine()
		// ->getEntityManager()
		// ->getRepository(Hotel::class);
		// echo 'le repository courant est '.get_class($repository);exit;

		

		
		// finds *all* hotels
		$repo = $this->getDoctrine()->getRepository(Hotel::class);
		$hotels = $repo->findAll();		

		return $this->render('hotel/hotels.html.twig', ['hotels' => $hotels]);
		

	}
	
	/**
	* @Route("/hotel/{id_hotel}", name="hotel_detail")
	*/
	public function hotel($id_hotel)
	{
		//custom funciton
		$repo = $this->getDoctrine()->getRepository(Hotel::class);
		$hotel = $repo->find($id_hotel);
		
		return $this->render('hotel/hoteldetail.html.twig', ['hotel' => $hotel]);
	}
	
	/**
	* @Route("/hotel_new", name="hotel_new")
	*/
	public function addHotel(Request $request)
	{
		
		
		
		
        return $this->render('hotel/add.html.twig');
	}

	/**
	* @Route("/savehotel", name="hotel_save")
	*/
	public function saveHotel(Request $request)
	{

		
		if($_POST['id'] == 0 ){
			$hotel = new Hotel();
			$new = true;
		}
		else{
			$repo = $this->getDoctrine()->getRepository(Hotel::class);
			$hotel = $repo->find($_POST['id']);
			}
		
		$hotel->setName($_POST['name']);
		$hotel->setAddress($_POST['address']);
		$hotel->setPostalcode($_POST['postalcode']);
		$hotel->setCity($_POST['city']);
		$hotel->setPhonenumber($_POST['phonenumber']);
		

		$em = $this->getDoctrine()->getManager();
		if ($new){
			$em->persist($hotel);
			}
		$em->flush();

		var_dump($hotel);
		exit;		
	}



	/**
	* @Route("/hotel/{id_hotel}/edit", name="edit_hotel")
	*/
	public function editHotel(Request $request, $id_hotel)
	{
		
		$repo = $this->getDoctrine()->getRepository(Hotel::class);
		$hotel = $repo->find($id_hotel);

    	return $this->render('hotel/add.html.twig', ['hotel' => $hotel]);
	}


	/**
	* @Route("/hotel/{id_hotel}/delete", name="delete_hotel")
	*/
	public function deleteHotel(Request $request, $id_hotel)
	{
		
		$repo = $this->getDoctrine()->getRepository(Hotel::class);
		$hotel = $repo->find($id_hotel);
		
		$em = $this->getDoctrine()->getManager();
        $em->remove($hotel);
        $em->flush();
        $this->addFlash(
            'notice',
            'hotel successfully deleted!'
        );
		return $this->redirectToRoute('hotels');
	}

	/**
	* @Route("/hoteltestrepo", name="hoteltestrepo")
	*/
	public function hoteltestrepo()
	{
		$repository = $this->getDoctrine()
		->getEntityManager()
		->getRepository(Hotel::class);
		echo 'le repository courant est '.get_class($repository);exit;
	}
}
