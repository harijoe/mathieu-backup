<?php

namespace Ardemis\MainBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;

/**
 * Class FixtureLoader
 */
class FixtureLoader extends DataFixtureLoader
{

    /**
     * Returns an array of file paths to fixtures
     *
     * @return array<string>
     */
    protected function getFixtures()
    {
        return array(
            __DIR__.'/agencies.yml',
            //__DIR__.'/candidates.yml',
            //__DIR__.'/job.yml',
        );
    }
}
