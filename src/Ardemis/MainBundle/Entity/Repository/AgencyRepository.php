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
}
