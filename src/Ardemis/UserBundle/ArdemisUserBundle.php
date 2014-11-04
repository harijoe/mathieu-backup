<?php

namespace Ardemis\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class ArdemisUserBundle
 */
class ArdemisUserBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
