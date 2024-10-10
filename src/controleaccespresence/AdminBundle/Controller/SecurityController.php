<?php

    namespace FosSf3\BackOfficeBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\RedirectResponse;

    class SecurityController extends Controller
    {
        /**
         * Renders the login template with the given parameters. Overwrite this function in
         * an extended controller to provide additional data for the login template.
         *
         * @param array $data
         *
         * @return \Symfony\Component\HttpFoundation\Response
         */
        protected
        function renderLogin ( array $data )
        {
            return $this->container->get ( 'templating' )->renderResponse ( 'controleaccespresenceAdminBundle:Security:login.html.twig', $data );
        }


    }
