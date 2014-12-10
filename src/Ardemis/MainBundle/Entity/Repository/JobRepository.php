<?php

namespace Ardemis\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * Class JobRepository
 */
class JobRepository extends EntityRepository
{
    /**
     * @param integer $agencyId
     *
     * @return Query
     */
    public function findJobsFromAgencyById($agencyId)
    {
        $query = $this->createQueryBuilder('job')
                      ->where('job.agency = :agency')
                      ->setParameter('agency', $agencyId);


        return $query->getQuery();
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
