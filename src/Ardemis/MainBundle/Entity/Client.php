<?php

namespace Ardemis\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as JMSS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Client
 *
 * @ORM\Entity(repositoryClass="Ardemis\MainBundle\Entity\Repository\ClientRepository")
 * @ORM\Table(name="client", indexes={@ORM\Index(name="search_idx", columns={"company_name", "note"})})
 */
class Client
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
     * @ORM\Column(name="company_name", type="string")
     * @Assert\NotBlank()
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=5)
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="5")
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string")
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="activity", type="string")
     * @Assert\NotBlank()
     */
    private $activity;

    /**
     * @var Agency
     *
     * @ORM\ManyToOne(targetEntity="Ardemis\MainBundle\Entity\Agency")
     */
    private $agency;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string")
     * @Assert\NotBlank()
     */
    private $address;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ardemis\MainBundle\Entity\ClientContact", mappedBy="client", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $contacts;

    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="string", nullable=true)
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", nullable=true)
     */
    private $file;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ardemis\MainBundle\Entity\Job", mappedBy="client")
     * @JMSS\Exclude()
     */
    private $jobs;

    /**
     * @var number
     * @ORM\Column(name="note", type="float", nullable=true)
     */
    private $note;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ardemis\MainBundle\Entity\Comment", mappedBy="client", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $comments;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->jobs = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return mixed
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param Agency $agency
     */
    public function setAgency(Agency $agency)
    {
        $this->agency = $agency;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param ClientContact $contact
     */
    public function addContact(ClientContact $contact)
    {
        $this->contacts->add($contact);
        $contact->setClient($this);
    }

    /**
     * @param ClientContact $contacts
     */
    public function removeContact(ClientContact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Add jobs
     *
     * @param Job $jobs
     *
     * @return Agency
     */
    public function addJob(Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param Job $jobs
     */
    public function removeJob(Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->companyName;
    }

    /**
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param float $note
     *
     * @return Client
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Client
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Client
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Add comments
     *
     * @param \Ardemis\MainBundle\Entity\Comment $comments
     * @return Client
     */
    public function addComment(\Ardemis\MainBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->setClient($this);

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Ardemis\MainBundle\Entity\Comment $comments
     */
    public function removeComment(\Ardemis\MainBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
