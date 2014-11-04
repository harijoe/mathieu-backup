<?php

namespace Ardemis\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * Class AgencyRepository
 */
class AgencyRepository extends EntityRepository
{
    /**
     *
     */
    public function findAllAPI()
    {
        $qb = $this->createQueryBuilder('a')
                   ->leftJoin('a.jobs', 'j')
                   ->select('a, j.createdAt')
//                   ->addSelect('IDENTITY(j.id)')
                   ->getQuery();
//                   ->setHint(Query::HINT_FORCE_PARTIAL_LOAD, true);

        return $qb->getResult();
    }
}
