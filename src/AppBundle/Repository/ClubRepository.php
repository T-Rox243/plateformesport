<?php

namespace AppBundle\Repository;

/**
 * ClubRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
use Doctrine\ORM\EntityRepository;

class ClubRepository extends EntityRepository
{

	// public function monTestAMoi(){
		
	// 	// Version plus longue et plus lourde
	// 	// $queryBuilder = $this->_em->createQueryBuilder()
	// 	// ->select('name')
	// 	// ->from($this->_entityName, 'name');

	// 	$plop = "plop";

	// 	// Version plus rapide et plus legere
	// 	$queryBuilder = $this->createQueryBuilder('allInfo');
	// 	$queryBuilder->where('allInfo.name = :name')
	// 				->setParameter('name', $plop);

	// 	// On recupere la query grace au query builder
	// 	$query = $queryBuilder->getQuery();

	// 	// on recupere le(s) resultat(s) à partir de la query
 // 		$results = $query->getResult();

	// 	return $results;
	// }

	public function clubAdminNoValid()
	{
		$adminValue = 0;

		$queryBuilder = $this->createQueryBuilder('clubNoValid');
		$queryBuilder->where('clubNoValid.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

	public function clubAdminValid()
	{
		$adminValue = 1;

		$queryBuilder = $this->createQueryBuilder('clubValid');
		$queryBuilder->where('clubValid.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

	public function clubIndexAdmin()
	{
		$adminValue = 0;
		$limit = 3;

		$queryBuilder = $this->createQueryBuilder('clubIndex');
		$queryBuilder->where('clubIndex.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue);

		$queryBuilder->andwhere('clubIndex.confirmAdmin = :confirmAdmin')
						->setParameter('confirmAdmin', $adminValue)
						->setMaxResults( $limit );
		
		$query = $queryBuilder->getQuery();

		$results = $query->getResult();

		return $results;
	}

}
