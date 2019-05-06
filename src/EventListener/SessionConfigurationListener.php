<?php
/*
 * Copyright (c) KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * This file is part of RouteBasedSessionConfigurationBundle.
 *
 * This program and the accompanying materials are made available under
 * the terms of the BSD 2-Clause License which accompanies this
 * distribution, and is available at http://opensource.org/licenses/BSD-2-Clause
 */

namespace PHPMentors\RouteBasedSessionConfigurationBundle\EventListener;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\RouterInterface;

class SessionConfigurationListener
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var NativeSessionStorage
     */
    private $sessionStorage;

    /**
     * @param RouterInterface  $router
     * @param SessionInterface $session
     */
    public function __construct(RouterInterface $router, SessionStorageInterface $sessionStorage)
    {
        $this->router = $router;
        $this->sessionStorage = $sessionStorage;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($this->sessionStorage === null) {
            return;
        }

        if ($event->isMasterRequest() && !$this->sessionStorage->isStarted()) {
            $route = $this->router->getRouteCollection()->get($event->getRequest()->get('_route'));
            if ($route === null) {
                return;
            }

            if (!$route->hasOption('session')) {
                return;
            }

            $this->sessionStorage->setOptions($route->getOption('session'));
        }
    }
}
