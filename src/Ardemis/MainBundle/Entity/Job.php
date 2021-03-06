<?php

namespace Ardemis\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as JMSS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Job
 *
 * @ORM\Table(name="job", indexes={@ORM\Index(name="search_idx", columns={"title"})})
 * @ORM\Entity(repositoryClass="Ardemis\MainBundle\Entity\Repository\JobRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @Hateoas\Relation(name="_self", href = "expr('/jobs/' ~ object.getId())")
 * @Hateoas\Relation(name="agency", href = "expr('/agencies/' ~ object.getId())")
 */
class Job extends BaseEntity
{

    // French types
    const TYPE_FR_WORK_CONTRACT    = "job.type.fr.work_contract";
    const TYPE_FR_CDD              = "job.type.fr.cdd";
    const TYPE_FR_INTERIM          = "job.type.fr.interim";
    const TYPE_FR_INTERN           = "job.type.fr.intern";
    const TYPE_FR_MISSION          = "job.type.fr.mission";

    // English types
    const TYPE_UK_CONTRACTOR        = "job.type.uk.contractor";
    const TYPE_UK_PERM_CONTRACTOR   = "job.type.uk.perm_contractor";
    const TYPE_UK_TEMP_CONTRACTOR   = "job.type.uk.temp_contractor";
    const TYPE_UK_INTERN            = "job.type.uk.intern";

    const INCOME_TYPE_YEARLY        = "job.income.type.yearly";
    const INCOME_TYPE_DAYLY         = "job.income.type.daily";
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var \DateTIme
     *
     * @ORM\Column(name="publishedAt", type="datetime", nullable=true)
     */
    private $publishedAt;
    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    private $published;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startAt", type="datetime", nullable=true)
     */
    private $startAt;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireAt", type="datetime", nullable=true)
     */
    private $expireAt;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * Fonction plus précise du job
     *
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;
    /**
     * CDI, CDD, Mission...
     *
     * @var string
     *
     * @ORM\Column(name="job_type", type="string", length=255, nullable=true)
     * @Assert\Choice(callback="getJobTypes")
     */
    private $jobType;
    /**
     * @var string
     *
     * @ORM\Column(name="income_type", type="string", nullable=true)
     * @Assert\Choice(callback="getIncomeTypes")
     */
    private $incomeType;
    /**
     * Salaire
     *
     * @var string
     *
     * @ORM\Column(name="income", type="string", length=255, nullable=true)
     */
    private $income;
    /**
     * Salaire selon profil
     *
     * @var boolean
     *
     * @ORM\Column(name="income_based_on_profile", type="boolean", nullable=true)
     */
    private $incomeBasedOnProfile;
    /**
     * @var string
     *
     * @ORM\Column(name="technologies", type="string", length=255, nullable=true)
     */
    private $technologies;
    /**
     * @var string
     *
     * @ORM\Column(name="tools", type="string", length=255, nullable=true)
     */
    private $tools;
    /**
     * Niveau d'étude
     *
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=255, nullable=true)
     * @Assert\Choice(callback="getGrades")
     */
    private $grade;
    /**
     * Position d'affichage
     *
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;
    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;
    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description = "Entreprise\n\n\n\nResponsabilités\n\n\n\nProfil\n\n\n\n";
    /**
     * @var Agency
     *
     * @Assert\NotNull(message="agency.not.null")
     *
     * @ORM\ManyToOne(targetEntity="Ardemis\MainBundle\Entity\Agency", inversedBy="jobs")
     * @ORM\JoinColumn(name="agency_id", referencedColumnName="id", nullable=false)
     *
     * @JMSS\Exclude()
     */
    private $agency;
    /**
     * @var Candidate
     *
     * @JMSS\Exclude()
     * @ORM\OneToMany(targetEntity="Ardemis\MainBundle\Entity\Candidate", mappedBy="jobOffer")
     */
    private $candidates;
    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="Ardemis\MainBundle\Entity\Client", inversedBy="jobs")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     *
     * @JMSS\Exclude()
     */
    private $client;
    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;
    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;
    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
    
    /**
     * @var ArrayCollection
     * @ORM\Column(name="emails", type="json_array")
     */
    private $emails;    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt  = new \DateTime('now');
        $this->candidates = new ArrayCollection();
    }

    /**
     * @return array
     */
    public static function getJobTypes()
    {
        return [
            self::TYPE_FR_WORK_CONTRACT => self::TYPE_FR_WORK_CONTRACT,
            self::TYPE_FR_CDD => self::TYPE_FR_CDD,
            self::TYPE_FR_INTERIM => self::TYPE_FR_INTERIM,
            self::TYPE_FR_INTERN => self::TYPE_FR_INTERN,
            self::TYPE_FR_MISSION => self::TYPE_FR_MISSION,
            self::TYPE_UK_CONTRACTOR => self::TYPE_UK_CONTRACTOR,
            self::TYPE_UK_PERM_CONTRACTOR => self::TYPE_UK_PERM_CONTRACTOR,
            self::TYPE_UK_TEMP_CONTRACTOR => self::TYPE_UK_TEMP_CONTRACTOR,
            self::TYPE_UK_INTERN => self::TYPE_UK_INTERN
        ];
    }

    /**
     * @return array
     */
    public static function getIncomeTypes()
    {
        return [
            self::INCOME_TYPE_YEARLY => self::INCOME_TYPE_YEARLY,
            self::INCOME_TYPE_DAYLY => self::INCOME_TYPE_DAYLY
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "(".$this->id.") ".$this->title;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Job
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get publishedAt
     *
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * Set publishedAt
     *
     * @return Job
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setPublishedAt()
    {
        if ($this->published) {
            $this->publishedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Job
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set startAt
     *
     * @param \DateTime $startAt
     *
     * @return Job
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get expireAt
     *
     * @return \DateTime
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * Set expireAt
     *
     * @param \DateTime $expireAt
     *
     * @return Job
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Job
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set job
     *
     * @param string $job
     *
     * @return Job
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get jobType
     *
     * @return string
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * Set jobType
     *
     * @param string $jobType
     *
     * @return Job
     */
    public function setJobType($jobType)
    {
        $this->jobType = $jobType;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncomeType()
    {
        return $this->incomeType;
    }

    /**
     * @param string $incomeType
     */
    public function setIncomeType($incomeType)
    {
        $this->incomeType = $incomeType;
    }

    /**
     * Get income
     *
     * @return string
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * Set income
     *
     * @param string $income
     *
     * @return Job
     */
    public function setIncome($income)
    {
        $this->income = $income;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIncomeBasedOnProfile()
    {
        return $this->incomeBasedOnProfile;
    }

    /**
     * @param boolean $incomeBasedOnProfile
     */
    public function setIncomeBasedOnProfile($incomeBasedOnProfile)
    {
        $this->incomeBasedOnProfile = $incomeBasedOnProfile;
    }

    /**
     * Get technologies
     *
     * @return string
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * Set technologies
     *
     * @param string $technologies
     *
     * @return Job
     */
    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;

        return $this;
    }

    /**
     * @return string
     */
    public function getTools()
    {
        return $this->tools;
    }

    /**
     * @param string $tools
     */
    public function setTools($tools)
    {
        $this->tools = $tools;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return Job
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Job
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Job
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Job
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Job
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get agency
     *
     * @return Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Set agency
     *
     * @param Agency $agency
     *
     * @return Job
     */
    public function setAgency(Agency $agency = null)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * @return Candidate
     */
    public function getCandidates()
    {
        return $this->candidates;
    }

    /**
     * @param Candidate $candidates
     */
    public function setCandidates(Candidate $candidates)
    {
        $this->candidates = $candidates;
    }
    /**
     * Get Client or null
     * 
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set Client
     * 
     * @param Client $client
     *
     * @return Job
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get incomeBasedOnProfile
     *
     * @return boolean 
     */
    public function getIncomeBasedOnProfile()
    {
        return $this->incomeBasedOnProfile;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Job
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Add candidates
     *
     * @param \Ardemis\MainBundle\Entity\Candidate $candidates
     * @return Job
     */
    public function addCandidate(\Ardemis\MainBundle\Entity\Candidate $candidates)
    {
        $this->candidates[] = $candidates;

        return $this;
    }

    /**
     * Remove candidates
     *
     * @param \Ardemis\MainBundle\Entity\Candidate $candidates
     */
    public function removeCandidate(\Ardemis\MainBundle\Entity\Candidate $candidates)
    {
        $this->candidates->removeElement($candidates);
    }

    /**
     * Set emails
     *
     * @param array $emails
     * @return Job
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * Get emails
     *
     * @return array 
     */
    public function getEmails()
    {
        return $this->emails;
    }
}
