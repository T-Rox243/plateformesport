<?php

namespace AppBundle\Repository;

/**
 * SportRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
use Doctrine\ORM\EntityRepository;

class SportRepository extends EntityRepository
{
	public function sportAdminNoValid()
	{
		$adminValue = 0;

		$queryBuilder = $this->createQueryBuilder('sportNoValid');
		$queryBuilder->where('sportNoValid.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

	public function sportAdminValid()
	{
		$adminValue = 1;

		$queryBuilder = $this->createQueryBuilder('sportValid');
		$queryBuilder->where('sportValid.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

	public function sportIndexAdmin()
	{
		$adminValue = 0;
		$limit = 3;

		$queryBuilder = $this->createQueryBuilder('sportIndex');
		$queryBuilder->where('sportIndex.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue)
						->setMaxResults( $limit );
		
		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

	public function sportIndex()
	{
		$adminValue = 1;
		$limit = 3;

		$queryBuilder = $this->createQueryBuilder('sportIndex');
		$queryBuilder->where('sportIndex.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue)
						->setMaxResults( $limit );
		
		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}
}
