<?php
/*
 * Copyright 2014 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Mibew\Mibew\Plugin\Boilerplate\Controller;

use Mibew\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller example.
 */
class HelloWorldController extends AbstractController
{
    /**
     * Displays a simple "Hello world" message.
     *
     * @param Request $request Incoming request.
     * @return Response Rendered page content.
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello ' . $request->attributes->get('name') . '!');
    }
}
