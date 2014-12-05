<?php

namespace Ardemis\MainBundle\Utils;

/**
 * Class Activities
 */
class Activities
{
    const ACTIVITY_AVIATION_AEROSPACE                   = "activity.aviation.aerospace";
    const ACTIVITY_AGRIFOOD                             = "activity.agrifood";
    const ACTIVITY_ART_CULTRE_RECREATION                = "activity.art.culture.recreation";
    const ACTIVITY_BANKING_INSURANCE_FINANCIALORG       = "activity.banking.insurance.financialorg";
    const ACTIVITY_AUDIOVISUAL_MEDIA                    = "activity.audiovisual.media";
    const ACTIVITY_AUDIT_ACCOUNTING                     = "activity.audit.accounting";
    const ACTIVITY_AUTOMOTIVE_MANUFACTURERS_EQUIPMENT   = "activity.automotive.manufacturers.equipment";
    const ACTIVITY_OTHER                                = "activity.other";
    const ACTIVITY_ENERGY                               = "activity.energy";
    const ACTIVITY_REAL_ESTATE                          = "activity.real.estate";
    const ACTIVITY_ELECTORNICS_INDUSTRY                 = "activity.electronics.industry";
    const ACTIVITY_HEALTH_MEDICAL_PHARMACEUTICAL        = "activity.health.medical.pharmaceutical";
    const ACTIVITY_COMPUTER_HARDWARE                    = "activity.computer.hardware";
    const ACTIVITY_COMPUTER_SERVICE                     = "activity.computer.service";
    const ACTIVITY_COMPUTER_SOFTWARE                    = "activity.computer.software";
    const ACTIVITY_INTERNET_ECOMMERCE                   = "activity.internet.ecommerce";
    const ACTIVITY_MARKETING_COMMUNICATION_ADVERTISING  = "activity.marketing.communication.advertising";
    const ACTIVITY_STAFFING                             = "activity.staffing";
    const ACTIVITY_PUBLIC_SECTOR                        = "activity.public.sector";
    const ACTIVITY_TELECOM_MOBILITY                     = "activity.telecom.mobility";

    /**
     * @return array
     */
    public static function getActivities()
    {
        return [
            self::ACTIVITY_AVIATION_AEROSPACE                   => self::ACTIVITY_AVIATION_AEROSPACE,
            self::ACTIVITY_AGRIFOOD                             => self::ACTIVITY_AGRIFOOD,
            self::ACTIVITY_ART_CULTRE_RECREATION                => self::ACTIVITY_ART_CULTRE_RECREATION,
            self::ACTIVITY_BANKING_INSURANCE_FINANCIALORG       => self::ACTIVITY_BANKING_INSURANCE_FINANCIALORG,
            self::ACTIVITY_AUDIOVISUAL_MEDIA                    => self::ACTIVITY_AUDIOVISUAL_MEDIA,
            self::ACTIVITY_AUDIT_ACCOUNTING                     => self::ACTIVITY_AUDIT_ACCOUNTING,
            self::ACTIVITY_AUTOMOTIVE_MANUFACTURERS_EQUIPMENT   => self::ACTIVITY_AUTOMOTIVE_MANUFACTURERS_EQUIPMENT,
            self::ACTIVITY_OTHER                                => self::ACTIVITY_OTHER,
            self::ACTIVITY_ENERGY                               => self::ACTIVITY_ENERGY,
            self::ACTIVITY_REAL_ESTATE                          => self::ACTIVITY_REAL_ESTATE,
            self::ACTIVITY_ELECTORNICS_INDUSTRY                 => self::ACTIVITY_ELECTORNICS_INDUSTRY,
            self::ACTIVITY_HEALTH_MEDICAL_PHARMACEUTICAL        => self::ACTIVITY_HEALTH_MEDICAL_PHARMACEUTICAL,
            self::ACTIVITY_COMPUTER_HARDWARE                    => self::ACTIVITY_COMPUTER_HARDWARE,
            self::ACTIVITY_COMPUTER_SERVICE                     => self::ACTIVITY_COMPUTER_SERVICE,
            self::ACTIVITY_COMPUTER_SOFTWARE                    => self::ACTIVITY_COMPUTER_SOFTWARE,
            self::ACTIVITY_INTERNET_ECOMMERCE                   => self::ACTIVITY_INTERNET_ECOMMERCE,
            self::ACTIVITY_MARKETING_COMMUNICATION_ADVERTISING  => self::ACTIVITY_MARKETING_COMMUNICATION_ADVERTISING,
            self::ACTIVITY_STAFFING                             => self::ACTIVITY_STAFFING,
            self::ACTIVITY_PUBLIC_SECTOR                        => self::ACTIVITY_PUBLIC_SECTOR,
            self::ACTIVITY_TELECOM_MOBILITY                     => self::ACTIVITY_TELECOM_MOBILITY
        ];
    }
}
