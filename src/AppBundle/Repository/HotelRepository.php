<?php
// src/AppBundle/Repository/HotelRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class HotelRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Hotel p ORDER BY p.name ASC'
            )
            ->getResult();
    }
	public function findNameById($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.name FROM AppBundle:Hotel p WHERE p.id='.$id
            )
            ->getResult();
    }
}
