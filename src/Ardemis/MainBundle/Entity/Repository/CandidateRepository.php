<?php

namespace Ardemis\MainBundle\Entity\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class CandidateRepository
 */
class CandidateRepository extends EntityRepository
{

    /**
     * @param array $searchFormData
     *
     * @return array
     */
    public function getSearchQuery($searchFormData)
    {
        $query = $this->createQueryBuilder('c');

        if ($searchFormData['name']) {
            $query->andWhere('c.firstname LIKE :name')
                ->orWhere('c.lastname LIKE :name')
                ->setParameter('name', $searchFormData['name'] . '%');
        }

        if ($searchFormData['keySkills']) {
            $query->andWhere('c.keySkills LIKE :keyskills')
                ->setParameter('keyskills', '%' . $searchFormData['keySkills'] . '%');
        }

        if ($searchFormData['disponibility']) {
            $query->andWhere('c.disponibility = :disponiblity')
                ->setParameter('disponiblity', $searchFormData['disponibility']);
        }

        if ($searchFormData['note']) {
            $query->andWhere('c.note = :note')
                ->setParameter('note', $searchFormData['note']);
        }

        if ($searchFormData['name'] || $searchFormData['keySkills'] || $searchFormData['disponibility'] || $searchFormData['note']) {
            $query->addOrderBy('j.updatedAt', 'DESC');

            return $query->getQuery();
        }

        return [];
    }
}
