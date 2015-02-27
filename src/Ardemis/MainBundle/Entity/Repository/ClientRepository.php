<?php

namespace Ardemis\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ClientRepository
 */
class ClientRepository extends EntityRepository
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
            $query->andWhere('c.companyName LIKE :name')
                ->setParameter('name', $searchFormData['name'] . '%');
        }

        if (!empty($searchFormData['note'])) {
            $query->andWhere('c.note = :note')
                ->setParameter('note', $searchFormData['note']);
        }

        if (!empty($searchFormData['name']) || !empty($searchFormData['note'])) {
            $query->addOrderBy('c.updatedAt', 'DESC');

            return $query->getQuery();
        }

        return [];
    }
}
