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

namespace PHPMentors\RouteBasedSessionConfigurationBundle\Functional;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

/**
 * @since Class available since Release 1.1.0
 */
class RuntimeSessionConfigurationTest extends AbstractTestCase
{
    public function startSessionByRouteConfigurationData()
    {
        return array(
            array('https://www.example.com/runtime-session-configuration/', 'USER_SESSION'),
            array('https://www.example.com/admin/runtime-session-configuration/', 'ADMIN_SESSION'),
        );
    }

    /**
     * @test
     * @dataProvider startSessionByRouteConfigurationData
     *
     * @param string $url
     * @param string $sessionName
     */
    public function startSessionByRouteConfiguration($url, $sessionName)
    {
        $client = $this->createClient(array('config' => function (ContainerBuilder $container) {
            $container->loadFromExtension('framework', array(
                'secret' => '$ecret',
            ));
        }));

        $client->request('GET', $url);

        $this->assertThat($client->getResponse()->getStatusCode(), $this->equalTo(200));

        $content = json_decode($client->getResponse()->getContent(), true);

        $this->assertThat($content['session']['options']['name'], $this->equalTo($sessionName));
    }
}
