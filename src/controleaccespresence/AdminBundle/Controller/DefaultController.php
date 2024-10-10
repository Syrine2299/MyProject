<?php

namespace controleaccespresence\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('controleaccespresenceAdminBundle:Default:index.html.twig');
    }

    public function indexuserAction()
    {
        return $this->render('controleaccespresenceAdminBundle:Default:indexuser.html.twig');
    }

}
