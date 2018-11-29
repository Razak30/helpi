<?php
// src/AppBundle/Repository/HotelRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RoomTypeRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:RoomType p ORDER BY p.name ASC'
            )
            ->getResult();
    }
	public function findNameById($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.name FROM AppBundle:RoomType p WHERE p.id='.$id
            )
            ->getResult();
    }
}
