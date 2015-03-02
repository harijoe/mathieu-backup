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

    protected function getLanguages()
    {
        return ['php', 'python', 'java', 'ruby', 'html', 'css', 'c++', 'c#', 'objectivec' ];
    }

    protected function getSkills()
    {
        return ['conception', 'administration', 'java', 'ruby', 'html', 'css', 'c++', 'c#', 'objectivec' ];
    }

    public function job()
    {
        $jobs = Candidate::getJobs();
        return $jobs[array_rand($jobs)];
    }
    
    public function languages(){
        return $this->getStringFromElements($this->getLanguages());
    }
    
    public function skills(){
        return $this->getStringFromElements($this->getSkills());
    }
    
    public function technologies(){
        return $this->getStringFromElements(array_merge($this->getLanguages(), $this->getSkills()));
    }
    
    protected function getStringFromElements($array){
        return implode(" ", array_filter($array, function(){return (bool)mt_rand(0, 1);}));
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
