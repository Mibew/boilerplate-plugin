<?php

namespace Mibew\Mibew\Plugin\Boilerplate\Controller;

use Mibew\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Serve license info page
 */
class HelloWorldController extends AbstractController
{
    /**
     * Generate content for "mibew_boilerplate_hello" route.
     *
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello ' . $request->attributes->get('name') . '!');
    }
}
