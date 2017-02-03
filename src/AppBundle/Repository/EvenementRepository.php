<?php

namespace AppBundle\Repository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
use Doctrine\ORM\EntityRepository;

class EvenementRepository extends EntityRepository
{
	public function eventAdminNoValid()
	{
		$adminValue = 0;

		$queryBuilder = $this->createQueryBuilder('clubNoValid');
		$queryBuilder->where('clubNoValid.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

	public function eventAdminValid()
	{
		$adminValue = 1;

		$queryBuilder = $this->createQueryBuilder('clubNoValid');
		$queryBuilder->where('clubNoValid.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}
}
