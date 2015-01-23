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

        if ($searchFormData['name']) {
            $query->andWhere('c.companyName LIKE :name')
                ->setParameter('name', $searchFormData['name'] . '%');
        }

        if ($searchFormData['note']) {
            $query->andWhere('c.note = :note')
                ->setParameter('note', $searchFormData['note']);
        }

        if ($searchFormData['name'] || $searchFormData['note']) {
            $query->addOrderBy('j.updatedAt', 'DESC');

            return $query->getQuery();
        }

        return [];
    }
}
