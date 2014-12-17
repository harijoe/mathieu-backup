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

    // UK
    const GRADE_BACHELOR    = "grade.uk.bachelor";
    const GRADE_BACHELOR_HO = "grade.uk.bachelor_honour";
    const GRADE_MASTER_SCI  = "grade.uk.master_science";
    CONST GRADE_MASTER_ART  = "grade.uk.master_art";
    CONST GRADE_MASTER      = "grade.uk.master";
    CONST GRADE_DOCTORATE   = "grade.uk.doctorate";

    /**
     * @return array
     */
    public static function getGrades()
    {
        return [
            self::GRADE_BAC         => self::GRADE_BAC,
            self::GRADE_DUT         => self::GRADE_DUT,
            self::GRADE_BAC_2       => self::GRADE_BAC_2,
            self::GRADE_BAC_3       => self::GRADE_BAC_3,
            self::GRADE_BAC_4       => self::GRADE_BAC_4,
            self::GRADE_BAC_5_PLUS  => self::GRADE_BAC_5_PLUS,
            self::GRADE_ENGINEER    => self::GRADE_ENGINEER,
            self::GRADE_BACHELOR    => self::GRADE_BACHELOR,
            self::GRADE_BACHELOR_HO => self::GRADE_BACHELOR_HO,
            self::GRADE_MASTER_SCI  => self::GRADE_MASTER_SCI,
            self::GRADE_MASTER_ART  => self::GRADE_MASTER_ART,
            self::GRADE_MASTER      => self::GRADE_MASTER,
            self::GRADE_DOCTORATE   => self:: GRADE_DOCTORATE,
        ];
    }

}
