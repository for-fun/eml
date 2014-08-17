<?php

namespace Maps\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MapsUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
