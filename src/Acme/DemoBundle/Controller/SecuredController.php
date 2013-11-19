<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/demo/secured")
 */
class SecuredController extends Controller
{
    /**
     * @Route("/login", name="_demo_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_demo_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/hello", defaults={"name"="World"}),
     * @Route("/hello/{name}", name="_demo_secured_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        // return
        function a()
        {
            echo "a";

            return;

            echo "b";
            echo "c";
            echo "d";
        }

        // break
        while (true) {
            echo "a";

            break;

            echo "b";
            echo "c";
            echo "d";
        }

        // continue
        for ($i = 0; $i < 3; $i ++) {
            echo "a";

            continue;

            echo "b";
            echo "c";
            echo "d";
        }

        // die
        function b()
        {
            echo "a";

            die();

            echo "b";
            echo "c";
            echo "d";
        }

        // exit
        function c()
        {
            echo "a";

            exit();

            echo "b";
            echo "c";
            echo "d";
        }

        // throw
        function c()
        {
            echo "a";

            throw new \Exception();

            echo "b";
            echo "c";
            echo "d";
        }

        return array('name' => $name);
    }

    /**
     * @Route("/hello/admin/{name}", name="_demo_secured_hello_admin")
     * @Template()
     */
    public function helloadminAction($name)
    {
        return array('name' => $name);
    }
}
