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
            ->setParameter('agency', $agencyId)
            ->orderBy('job.position', 'DESC')
            ->addOrderBy('job.id', 'DESC')
            ->andWhere('job.expireAt > :now1')
            ->setParameter(':now1', new \DateTime('now'))
            ->andWhere('job.startAt < :now2')
            ->setParameter(':now2', new \DateTime('now'))
            ;


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

        if (!empty($searchFormData['name'])){
            $query
                ->andWhere('j.job LIKE :name')
                ->setParameter('name', $searchFormData['name'] . '%')
            ;
        }

        if (!empty($searchFormData['keySkills'])){
            $keySkills = array_map('trim', explode(',', $searchFormData['keySkills']));
            foreach ($keySkills as $keySkill) {
                $query
                    ->andWhere('j.technologies LIKE :keyskills')
                    ->orWhere('j.tools LIKE :keyskills')
                    ->setParameter('keyskills', '%' . $keySkill . '%');
            }
        }

        if (!empty($searchFormData['name']) or ! empty($searchFormData['keySkills'])){
            $query->addOrderBy('j.updatedAt', 'DESC');

            return $query->getQuery();
        }

        return [ ];
    }

}
