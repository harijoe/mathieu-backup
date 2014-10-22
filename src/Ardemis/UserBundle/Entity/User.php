<?php
namespace Ardemis\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class User
 *
 * @ORM\Entity(repositoryClass="Ardemis\UserBundle\Entity\Repository\UserRepository")
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

    /**
     * @var string
     * @ORM\Column(name="api_key", type="string", nullable=true)
     */
    private $apiKey;

    /** Construct */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Tells if the the given user is this user.
     *
     * Useful when not hydrating all fields.
     *
     * @param null|UserInterface $user
     *
     * @return boolean
     */
    public function isUser(UserInterface $user = null)
    {
        return null !== $user && $this->getId() === $user->getId();
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
