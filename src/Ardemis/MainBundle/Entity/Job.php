<?php

namespace Ardemis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Job
 *
 * @ORM\Table(name="job")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Job
{

    // French types
    const TYPE_FR_WORK_CONTRACT    = "job.type.fr.work_contract";
    const TYPE_FR_CDD              = "job.type.fr.cdd";
    const TYPE_FR_INTERIM          = "job.type.fr.interim";
    const TYPE_FR_INTERN           = "job.type.fr.intern";

    // English types
    const TYPE_UK_CONTRACTOR        = "job.type.uk.contractor";
    const TYPE_UK_PERM_CONTRACTOR   = "job.type.uk.perm_contractor";
    const TYPE_UK_TEMP_CONTRACT     = "job.type.uk.temp_contract";

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::TYPE_FR_WORK_CONTRACT => self::TYPE_FR_WORK_CONTRACT,
            self::TYPE_FR_CDD => self::TYPE_FR_CDD,
            self::TYPE_FR_INTERIM => self::TYPE_FR_INTERIM,
            self::TYPE_FR_INTERN => self::TYPE_FR_INTERN,
            self::TYPE_UK_CONTRACTOR => self::TYPE_UK_CONTRACTOR,
            self::TYPE_UK_PERM_CONTRACTOR => self::TYPE_UK_PERM_CONTRACTOR,
            self::TYPE_UK_TEMP_CONTRACT => self::TYPE_UK_TEMP_CONTRACT
        ];
    }

    // French
    const GRADE_BAC         = "job.grade.bac";
    const GRADE_DUT         = "job.grade.dut";
    const GRADE_BAC_2       = "job.grade.bac_2";
    const GRADE_BAC_3       = "job.grade.bac_3";
    const GRADE_BAC_4       = "job.grade.bac_4";
    const GRADE_BAC_5_PLUS  = "job.grade.bac_5_plus";
    const GRADE_ENGINEER    = "job.grade.engineer";

    /**
     * @return array
     */
    public static function getGrades()
    {
        return [
            self::GRADE_BAC => self::GRADE_BAC,
            self::GRADE_DUT => self::GRADE_DUT,
            self::GRADE_BAC_2 => self::GRADE_BAC_2,
            self::GRADE_BAC_3 => self::GRADE_BAC_3,
            self::GRADE_BAC_4 => self::GRADE_BAC_4,
            self::GRADE_BAC_5_PLUS => self::GRADE_BAC_5_PLUS,
            self::GRADE_ENGINEER => self::GRADE_ENGINEER,
        ];
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTIme
     *
     * @ORM\Column(name="publishedAt", type="datetime", nullable=true)
     */
    private $publishedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startAt", type="datetime")
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireAt", type="datetime")
     */
    private $expireAt;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * Fonction plus précise du job
     *
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255)
     */
    private $job;

    /**
     * CDI, CDD, Mission...
     *
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * @Assert\Choice(callback="getTypes")
     */
    private $type;

    /**
     * Salaire
     *
     * @var string
     *
     * @ORM\Column(name="income", type="string", length=255)
     */
    private $income;

    /**
     * @var string
     *
     * @ORM\Column(name="technologies", type="string", length=255)
     */
    private $technologies;

    /**
     * Niveau d'étude
     *
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=255)
     * @Assert\Choice(callback="getGrades")
     */
    private $grade;

    /**
     * Position d'affichage
     *
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
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
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Job
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
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
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Job
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
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
}
