<?php
// src/AppBundle/Repository/HotelRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class StatusRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Status p ORDER BY p.statusName ASC'
            )
            ->getResult();
    }
	public function findNameById($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.statusName FROM AppBundle:Status p WHERE p.statusId='.$id
            )
            ->getResult();
    }
}
