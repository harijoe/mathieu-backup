<?php


namespace Ardemis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Candidate
 *
 * @ORM\Table(name="candidate")
 * @ORM\Entity
 */
class Candidate extends BaseEntity
{
    const EXP_NOVICE  = "candidate.exp.novice";
    const EXP_JUNIOR  = "candidate.exp.junior";
    const EXP_INTERM  = "candidate.exp.intermediare";
    const EXP_CONFIRM = "candidate.exp.confirme";
    const EXP_SENIOR  = "candidate.exp.senior";

    /**
     * @return array
     */
    public static function getExperiences()
    {
        return [
            self::EXP_NOVICE => self::EXP_NOVICE,
            self::EXP_JUNIOR => self::EXP_JUNIOR,
            self::EXP_CONFIRM => self::EXP_CONFIRM,
            self::EXP_SENIOR => self::EXP_SENIOR,
        ];
    }

    const DISPO_IMMEDIATE  = "candidate.dispo.immediate";
    const DISPO_ONEMONTH   = "candidate.dispo.onemonth";
    const DISPO_TWOMONTH   = "candidate.dispo.onetwo";
    const DISPO_THREEMONTH = "candidate.dispo.onethree";

    /**
     * @return array
     */
    public static function getDisponibilities()
    {
        return [
            self::DISPO_IMMEDIATE => self::DISPO_IMMEDIATE,
            self::DISPO_ONEMONTH => self::DISPO_ONEMONTH,
            self::DISPO_TWOMONTH => self::DISPO_TWOMONTH,
            self::DISPO_THREEMONTH => self::DISPO_THREEMONTH
        ];
    }

    const MOBILITY_DEPARTEMENT   = "candidate.mobility.departement";
    const MOBILITY_REGIONAL      = "candidate.mobility.regional";
    const MOBILITY_NATIONAL      = "candidate.mobility.national";
    const MOBILITY_INTERNATIONAL = "candidate.mobility.international";

    /**
     * @return array
     */
    public static function getMobilities()
    {
        return [
            self::MOBILITY_DEPARTEMENT   => self::MOBILITY_DEPARTEMENT,
            self::MOBILITY_REGIONAL      => self::MOBILITY_REGIONAL,
            self::MOBILITY_NATIONAL      => self::MOBILITY_NATIONAL,
            self::MOBILITY_INTERNATIONAL => self::MOBILITY_INTERNATIONAL
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
     * @Assert\NotNull()
     */
    private $disponibilityNegociable;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string")
     * @Assert\Choice(callback="getExperiences")
     * @Assert\NotNull()
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="mobility", type="string")
     * @Assert\Choice(callback="getMobilities")
     * @Assert\NotNull()
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
     * @Assert\NotNull()
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
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="income", type="string")
     */
    private $income;

    /**
     * @var boolean
     * @ORM\Column(name="handicap", type="boolean")
     */
    private $handicap;

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
}
