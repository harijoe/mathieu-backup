<?php

namespace Ardemis\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository
 */
class UserRepository extends EntityRepository
{
    public function getEmails(Agency $agency=null){
        $queryBuilder = $this->createQueryBuilder('u');        
        $users = $queryBuilder->getQuery()->getResult();
        $mails = [];
        
        /* @var $user \Ardemis\UserBundle\Entity\User */
        foreach ($users as $user){
            $mails[] = $user->getEmail();            
        }
        
        return $mails;        
    }
}
