<?php

namespace Ardemis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClientContact
 *
 * @ORM\Entity()
 * @ORM\Table("client_contact")
 */
class ClientContact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="profils_wanted", type="string")
     * @Assert\NotBlank()
     */
    private $profilsWanted;

    /**
    private $function;

    /**
     * @ORM\ManyToOne(targetEntity="Ardemis\MainBundle\Entity\Client", inversedBy="contacts")
     */
    private $client;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getProfilsWanted()
    {
        return $this->profilsWanted;
    }

    /**
     * @param string $profilsWanted
     */
    public function setProfilsWanted($profilsWanted)
    {
        $this->profilsWanted = $profilsWanted;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
}
