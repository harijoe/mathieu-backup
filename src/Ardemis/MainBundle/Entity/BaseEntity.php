<?php
namespace Ardemis\MainBundle\Entity;

/**
 * Class BaseEntity
 */
class BaseEntity
{
    // French
    const GRADE_BAC         = "grade.fr.bac";
    const GRADE_DUT         = "grade.fr.dut";
    const GRADE_BAC_2       = "grade.fr.bac_2";
    const GRADE_BAC_3       = "grade.fr.bac_3";
    const GRADE_BAC_4       = "grade.fr.bac_4";
    const GRADE_BAC_5_PLUS  = "grade.fr.bac_5_plus";
    const GRADE_ENGINEER    = "grade.fr.engineer";

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

}
