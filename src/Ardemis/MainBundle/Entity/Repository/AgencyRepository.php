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
     * @return Query
     */
    public function getAllQuery()
    {
        $query = $this->createQueryBuilder('a')
                      ->getQuery();

        return $query;
    }

    /**
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function countAll()
    {
        $query = $this->createQueryBuilder('a')
                      ->select('count(a.id)')
                      ->getQuery();

        return $query->getSingleScalarResult();
    }
}
