<?php

namespace AppBundle\Repository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEventsByUser($user)
    {
        $qb = $this->getEntityManager()->createQueryBuilder('t');

        try{
            $qb->select('e')
            ->from('AppBundle:Event','e')
            ->where($qb->expr()->eq('e.user',':user'))
            ->setParameter(':user' ,$user);

            return $qb->getQuery()->getResult();

        }catch(\Doctrine\ORM\NoResultException $e)
        {
            return null;

        }
    }
}
