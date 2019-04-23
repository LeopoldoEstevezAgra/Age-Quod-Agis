<?php

namespace AppBundle\Repository;

/**
 * MonthTaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MonthTaskRepository extends \Doctrine\ORM\EntityRepository
{
	function findByUser($user){
		$qb = $this->createQueryBuilder('t');
		$qb
			->join('t.user','user')
			->where($qb->expr()->eq('user.id',':userid'))
			->setParameter(':userid',$user);

		try {
		echo($user);
		} catch (\Throwable $th) {
		}
		$query = $qb->getQuery();
		return $query->getResult();
	}
}
