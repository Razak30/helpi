<?php
// src/AppBundle/Repository/HotelRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InterventionTypeRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:InterventionType p ORDER BY p.interventionTypeName ASC'
            )
            ->getResult();
    }
	public function findNameById($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.interventionTypeName FROM AppBundle:InterventionType p WHERE p.interventionTypeId='.$id
            )
            ->getResult();
    }
}
