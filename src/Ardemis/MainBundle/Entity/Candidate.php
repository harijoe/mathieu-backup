<?php


namespace Ardemis\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Candidate
 *
 * @todo add return $this for every set
 *
 * @ORM\Table(name="candidate")
 * @ORM\Entity
 */
class Candidate
{
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
     * @todo prévoir case négociable à cocher si négociable
     *
     * @var string
     *
     * @ORM\Column(name="disponibility", type="string")
     */
    private $disponibility;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string")
     */
    private $experience;

    /**
     * @todo + "+ case texte libre pour écrire les départements/régions/pays recherchés
     * @todo ( A Arnaud : faire simple tout en laissant des possibilités évolutions)
     * @todo OUI avec possibilité cocher plusieurs régions ou pays"
     *
     * @var string
     *
     * @ORM\Column(name="mobility", type="string")
     */
    private $mobility;

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
     * @ORM\Column(name="grade_complement", type="string")
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
     */
    public function setDisponibility($disponibility)
    {
        $this->disponibility = $disponibility;
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
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
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
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
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
     */
    public function setGradeComplement($gradeComplement)
    {
        $this->gradeComplement = $gradeComplement;
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
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;
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
     */
    public function setIncome($income)
    {
        $this->income = $income;
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
     */
    public function setJob($job)
    {
        $this->job = $job;
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
     */
    public function setMobility($mobility)
    {
        $this->mobility = $mobility;
    }
}
