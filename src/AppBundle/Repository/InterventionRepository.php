<?php
// src/AppBundle/Repository/InterventionRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InterventionRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Intervention p ORDER BY p.name ASC'
            )
            ->getResult();
    }
	public function findNameById($id)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.name FROM AppBundle:Intervention p WHERE p.id='.$id
            )
            ->getResult();
    }
    public function findAllNonArchive()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Intervention p WHERE p.statusid = 1 or p.statusid = 2 or p.statusid = 3 or p.statusid = 4'
            )
            ->getResult();
    }
}
