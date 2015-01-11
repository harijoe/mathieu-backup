<?php


namespace Ardemis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Candidate
 *
 * @ORM\Table(name="candidate")
 * @ORM\Entity(repositoryClass="Ardemis\MainBundle\Entity\Repository\CandidateRepository")
 */
class Candidate extends BaseEntity
{
    /**
     * Candidate experience constants for translation
     */
    const CANDIDATE_EXP_NOVICE  = "candidate.exp.novice";
    const CANDIDATE_EXP_JUNIOR  = "candidate.exp.junior";
    const CANDIDATE_EXP_INTERM  = "candidate.exp.intermediaire";
    const CANDIDATE_EXP_CONFIRM = "candidate.exp.confirm";
    const CANDIDATE_EXP_SENIOR  = "candidate.exp.senior";

    /**
     * @return array
     */
    public static function getExperiences()
    {
        return [
            self::CANDIDATE_EXP_NOVICE => self::CANDIDATE_EXP_NOVICE,
            self::CANDIDATE_EXP_JUNIOR => self::CANDIDATE_EXP_JUNIOR,
            self::CANDIDATE_EXP_CONFIRM => self::CANDIDATE_EXP_CONFIRM,
            self::CANDIDATE_EXP_SENIOR => self::CANDIDATE_EXP_SENIOR,
        ];
    }

    /**
     * Candidate dipsonibility constants for translation
     */
    const CANDIDATE_DISPO_IMMEDIATE  = "candidate.dispo.immediate";
    const CANDIDATE_DISPO_ONEMONTH   = "candidate.dispo.onemonth";
    const CANDIDATE_DISPO_TWOMONTH   = "candidate.dispo.twomonth";
    const CANDIDATE_DISPO_THREEMONTH = "candidate.dispo.threemonth";

    /**
     * @return array
     */
    public static function getDisponibilities()
    {
        return [
            self::CANDIDATE_DISPO_IMMEDIATE => self::CANDIDATE_DISPO_IMMEDIATE,
            self::CANDIDATE_DISPO_ONEMONTH => self::CANDIDATE_DISPO_ONEMONTH,
            self::CANDIDATE_DISPO_TWOMONTH => self::CANDIDATE_DISPO_TWOMONTH,
            self::CANDIDATE_DISPO_THREEMONTH => self::CANDIDATE_DISPO_THREEMONTH
        ];
    }

    /**
     * Candidate mobility constants for translation
     */
    const CANDIDATE_MOBILITY_DEPARTEMENT   = "candidate.mobility.departement";
    const CANDIDATE_MOBILITY_REGIONAL      = "candidate.mobility.regional";
    const CANDIDATE_MOBILITY_NATIONAL      = "candidate.mobility.national";
    const CANDIDATE_MOBILITY_INTERNATIONAL = "candidate.mobility.international";

    /**
     * @return array
     */
    public static function getMobilities()
    {
        return [
            self::CANDIDATE_MOBILITY_DEPARTEMENT   => self::CANDIDATE_MOBILITY_DEPARTEMENT,
            self::CANDIDATE_MOBILITY_REGIONAL      => self::CANDIDATE_MOBILITY_REGIONAL,
            self::CANDIDATE_MOBILITY_NATIONAL      => self::CANDIDATE_MOBILITY_NATIONAL,
            self::CANDIDATE_MOBILITY_INTERNATIONAL => self::CANDIDATE_MOBILITY_INTERNATIONAL
        ];
    }

    /**
     * Candidate income constants for translation
     */
    const CANDIDATE_INCOME_1520    = "candidate.income.1520";
    const CANDIDATE_INCOME_2030    = "candidate.income.2030";
    const CANDIDATE_INCOME_3035    = "candidate.income.3035";
    const CANDIDATE_INCOME_3545    = "candidate.income.3545";
    const CANDIDATE_INCOME_4560    = "candidate.income.4560";
    const CANDIDATE_INCOME_6080    = "candidate.income.6080";
    const CANDIDATE_INCOME_80100   = "candidate.income.80100";
    const CANDIDATE_INCOME_100PLUS = "candidate.income.100PLUS";

    // Daily
    const CANDIDATE_INCOME_300400  = "candidate.income.daily.300400";

    const CANDIDATE_INCOME_1520_P    = "candidate.income.p.1520";
    const CANDIDATE_INCOME_2030_P    = "candidate.income.p.2030";
    const CANDIDATE_INCOME_3035_P    = "candidate.income.p.3035";
    const CANDIDATE_INCOME_3545_P    = "candidate.income.p.3545";
    const CANDIDATE_INCOME_4560_P    = "candidate.income.p.4560";
    const CANDIDATE_INCOME_6080_P    = "candidate.income.p.6080";
    const CANDIDATE_INCOME_80100_P   = "candidate.income.p.80100";
    const CANDIDATE_INCOME_100PLUS_P = "candidate.income.p.100PLUS";

    // Daily
    const CANDIDATE_INCOME_300400_P  = "candidate.income.p.daily.300400";

    /**
     * @return array
     */
    public static function getIncomes()
    {
        return [
            self::CANDIDATE_INCOME_1520     => self::CANDIDATE_INCOME_1520,
            self::CANDIDATE_INCOME_2030     => self::CANDIDATE_INCOME_2030,
            self::CANDIDATE_INCOME_3035     => self::CANDIDATE_INCOME_3035,
            self::CANDIDATE_INCOME_3545     => self::CANDIDATE_INCOME_3545,
            self::CANDIDATE_INCOME_4560     => self::CANDIDATE_INCOME_4560,
            self::CANDIDATE_INCOME_6080     => self::CANDIDATE_INCOME_6080,
            self::CANDIDATE_INCOME_100PLUS  => self::CANDIDATE_INCOME_100PLUS,
            self::CANDIDATE_INCOME_300400   => self::CANDIDATE_INCOME_300400,
            self::CANDIDATE_INCOME_1520_P     => self::CANDIDATE_INCOME_1520_P,
            self::CANDIDATE_INCOME_2030_P     => self::CANDIDATE_INCOME_2030_P,
            self::CANDIDATE_INCOME_3035_P     => self::CANDIDATE_INCOME_3035_P,
            self::CANDIDATE_INCOME_3545_P     => self::CANDIDATE_INCOME_3545_P,
            self::CANDIDATE_INCOME_4560_P     => self::CANDIDATE_INCOME_4560_P,
            self::CANDIDATE_INCOME_6080_P     => self::CANDIDATE_INCOME_6080_P,
            self::CANDIDATE_INCOME_100PLUS_P  => self::CANDIDATE_INCOME_100PLUS_P,
            self::CANDIDATE_INCOME_300400_P   => self::CANDIDATE_INCOME_300400_P,
        ];
    }

    /**
     * Candidate job constants for translation
     */
    const CANDIDATE_JOB_DEV                 = "candidate.job.dev";
    const CANDIDATE_JOB_TESTS_INTEGRATION   = "candidate.job.tests.integration";
    const CANDIDATE_JOB_FUNCTIONAL          = "candidate.job.functional";
    const CANDIDATE_JOB_DECISIONAL_BI       = "candidate.job.decisional.bi";
    const CANDIDATE_JOB_PROJECTMANAGER      = "candidate.job.project_manager";
    const CANDIDATE_JOB_MARKETING           = "candidate.job.marketing";
    const CANDIDATE_JOB_SALES               = "candidate.job.sales";
    const CANDIDATE_JOB_BUY_SELL_RH         = "candidate.job.buy.sell.rh";

    /**
     * @return array
     */
    public static function getJobs()
    {
        return [
            self::CANDIDATE_JOB_DEV => self::CANDIDATE_JOB_DEV,
            self::CANDIDATE_JOB_TESTS_INTEGRATION => self::CANDIDATE_JOB_TESTS_INTEGRATION,
            self::CANDIDATE_JOB_FUNCTIONAL => self::CANDIDATE_JOB_FUNCTIONAL,
            self::CANDIDATE_JOB_DECISIONAL_BI => self::CANDIDATE_JOB_DECISIONAL_BI,
            self::CANDIDATE_JOB_PROJECTMANAGER => self::CANDIDATE_JOB_PROJECTMANAGER,
            self::CANDIDATE_JOB_MARKETING => self::CANDIDATE_JOB_MARKETING,
            self::CANDIDATE_JOB_SALES => self::CANDIDATE_JOB_SALES,
            self::CANDIDATE_JOB_BUY_SELL_RH => self::CANDIDATE_JOB_BUY_SELL_RH
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
     * @var string
     * @ORM\Column(name="firstname", type="string")
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @var string
     * @ORM\Column(name="lastname", type="string")
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     * @ORM\Column(name="address", type="string")
     * @Assert\NotBlank()
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="zipcode", type="string")
     * @Assert\NotBlank()
     */
    private $zipcode;

    /**
     * @var string
     * @ORM\Column(name="city", type="string")
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(name="region", type="string")
     * @Assert\NotBlank()
     */
    private $region;

    /**
     * @var string
     * @ORM\Column(name="email", type="string")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="disponibility", type="string")
     * @Assert\Choice(callback="getDisponibilities")
     */
    private $disponibility;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponibility_negociable", type="boolean")
     */
    private $disponibilityNegociable;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string")
     * @Assert\Choice(callback="getExperiences")
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="mobility", type="string")
     * @Assert\Choice(callback="getMobilities")
     */
    private $mobility;

    /**
     * @var string
     *
     * @ORM\Column(name="mobility_complement", type="string")
     */
    private $mobilityComplement;

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
     * @var string
     *
     * @ORM\Column(name="grade_complement", type="string", nullable=true)
     */
    private $gradeComplement;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string")
     * @Assert\Choice(callback="getJobs")
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="income", type="string")
     * @Assert\Choice(callback="getIncomes")
     */
    private $income;

    /**
     * @var string
     * @ORM\Column(name="languages", type="string")
     * @Assert\NotBlank()
     */
    private $languages;

    /**
     * @var string
     * @ORM\Column(name="key_skills", type="string", nullable=true)
     */
    private $keySkills;

    /**
     * @ORM\OneToOne(targetEntity="Ardemis\MainBundle\Entity\Document", cascade={"persist"})
     * @ORM\JoinColumn(name="cv_id", referencedColumnName="id")
     */
    private $cv;

    /**
     * @ORM\OneToOne(targetEntity="Ardemis\MainBundle\Entity\Document", cascade={"persist"})
     * @ORM\JoinColumn(name="motivation_id", referencedColumnName="id")
     */
    private $motivation;

    /**
     * @var boolean
     * @ORM\Column(name="handicap", type="boolean")
     * @Assert\NotNull()
     */
    private $handicap;

    /**
     * @var Job
     * @ORM\ManyToOne(targetEntity="Ardemis\MainBundle\Entity\Job", inversedBy="candidates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobOffer;

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
    public function getDisponibility()
    {
        return $this->disponibility;
    }

    /**
     * @param string $disponibility
     *
     * @return $this
     */
    public function setDisponibility($disponibility)
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisponibilityNegociable()
    {
        return $this->disponibilityNegociable;
    }

    /**
     * @param boolean $disponibilityNegociable
     */
    public function setDisponibilityNegociable($disponibilityNegociable)
    {
        $this->disponibilityNegociable = $disponibilityNegociable;
    }

    /**
     * @return string
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param string $experience
     *
     * @return $this
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param string $grade
     *
     * @return $this
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return string
     */
    public function getGradeComplement()
    {
        return $this->gradeComplement;
    }

    /**
     * @param string $gradeComplement
     *
     * @return $this
     */
    public function setGradeComplement($gradeComplement)
    {
        $this->gradeComplement = $gradeComplement;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isHandicap()
    {
        return $this->handicap;
    }

    /**
     * @param boolean $handicap
     *
     * @return $this
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * @param string $income
     *
     * @return $this
     */
    public function setIncome($income)
    {
        $this->income = $income;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param string $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return string
     */
    public function getKeySkills()
    {
        return $this->keySkills;
    }

    /**
     * @param string $keySkills
     */
    public function setKeySkills($keySkills)
    {
        $this->keySkills = $keySkills;
    }

    /**
     * @return mixed
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param mixed $cv
     */
    public function setCv($cv)
    {
        $this->cv = $cv;
    }

    /**
     * @return mixed
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * @param mixed $motivation
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     *
     * @return $this
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobility()
    {
        return $this->mobility;
    }

    /**
     * @param string $mobility
     *
     * @return $this
     */
    public function setMobility($mobility)
    {
        $this->mobility = $mobility;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobilityComplement()
    {
        return $this->mobilityComplement;
    }

    /**
     * @param string $mobilityComplement
     */
    public function setMobilityComplement($mobilityComplement)
    {
        $this->mobilityComplement = $mobilityComplement;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
     * @return Job
     */
    public function getJobOffer()
    {
        return $this->jobOffer;
    }

    /**
     * @param Job $jobOffer
     */
    public function setJobOffer(Job $jobOffer)
    {
        $this->jobOffer = $jobOffer;
    }
    
    public function __toString(){
        return $this->firstname . " " .$this->lastname;
    }
}
