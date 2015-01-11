<?php

namespace Ardemis\MainBundle\DataFixtures\ORM;

use Ardemis\MainBundle\Entity\Candidate;
use Ardemis\MainBundle\Entity\Job;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;

/**
 * Class FixtureLoader
 */
class FixtureLoader extends DataFixtureLoader implements OrderedFixtureInterface
{

    /**
     * Returns an array of file paths to fixtures
     *
     * @return array<string>
     */
    protected function getFixtures()
    {
        return array(
            __DIR__ . '/agencies.yml',
            __DIR__ . '/clients.yml',
            __DIR__ . '/jobs.yml',
            __DIR__ . '/candidates.yml',
        );
    }

    public function grade()
    {
        $data = Job::getGrades();

        return $data[array_rand($data)];
    }

    public function jobType()
    {
        $data = Job::getJobTypes();

        return $data[array_rand($data)];
    }

    public function incomeType()
    {
        $data = Job::getIncomeTypes();

        return $data[array_rand($data)];
    }

    public function disponibility()
    {
        $data = Candidate::getDisponibilities();

        return $data[array_rand($data)];
    }

    public function experience()
    {
        $data = Candidate::getExperiences();

        return $data[array_rand($data)];
    }

    public function income()
    {
        $data = Candidate::getIncomes();

        return $data[array_rand($data)];
    }

    public function mobility()
    {
        $data = Candidate::getMobilities();

        return $data[array_rand($data)];
    }

    public function getOrder()
    {
        return 1;
    }

}
