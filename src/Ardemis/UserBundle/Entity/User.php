<?php
namespace Ardemis\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @ORM\Entity()
 * @ORM\Table(name="ardemis_user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** Construct */
    public function __construct()
    {
        parent::__construct();
    }
}
