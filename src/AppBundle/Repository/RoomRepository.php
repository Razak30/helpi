<?php
// src/AppBundle/Repository/HotelRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RoomRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Room p ORDER BY p.roomNumber ASC'
            )
            ->getResult();
    }
	public function findNameById($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.roomNumber FROM AppBundle:Room p WHERE p.roomId='.$id
            )
            ->getResult();
    }
}
