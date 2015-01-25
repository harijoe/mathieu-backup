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

    /**
     * @param array $searchFormData
     *
     * @return array
     */
    public function getSearchQuery($searchFormData)
    {
        $query = $this->createQueryBuilder('j');

        if ($searchFormData['name']) {
            $query->andWhere('j.job LIKE :name')
                ->setParameter('name', $searchFormData['name'] . '%')
                ->addOrderBy('j.updatedAt', 'DESC');

            return $query->getQuery();
        }

        return [];
    }
}
