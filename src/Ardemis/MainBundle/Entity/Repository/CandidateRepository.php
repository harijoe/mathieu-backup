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

        if (!empty($searchFormData['name'])) {
            $query
                ->andWhere('c.firstname LIKE :name')
                ->orWhere('c.lastname LIKE :name')
                ->setParameter('name', $searchFormData['name'] . '%');
        }

        if (!empty($searchFormData['keySkills'])) {

            $keySkills = array_map('trim', explode(',', $searchFormData['keySkills']));

            foreach ($keySkills as $keySkill) {
                $query
                    ->andWhere('c.keySkills LIKE :keyskills')
                    ->orWhere('c.languages LIKE :keyskills')
                    ->setParameter('keyskills', '%' . $keySkill . '%');
            }
        }

        if (!empty($searchFormData['disponibility'])) {
            $query
                ->andWhere('c.disponibility = :disponiblity')
                ->setParameter('disponiblity', $searchFormData['disponibility']);
        }

        if (!empty($searchFormData['note'])) {
            $query
                ->andWhere('c.note = :note')
                ->setParameter('note', $searchFormData['note']);
        }

        if (!empty($searchFormData['name']) || !empty($searchFormData['keySkills']) || !empty($searchFormData['disponibility']) || !empty($searchFormData['note'])) {
            $query->addOrderBy('c.updatedAt', 'DESC');

            return $query->getQuery();
        }

        return [];
    }
}
