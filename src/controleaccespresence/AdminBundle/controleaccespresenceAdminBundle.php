<?php

namespace controleaccespresence\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class controleaccespresenceAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
