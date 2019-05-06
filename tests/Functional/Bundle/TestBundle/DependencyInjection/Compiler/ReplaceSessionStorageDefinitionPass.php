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

namespace PHPMentors\RouteBasedSessionConfigurationBundle\Functional\Bundle\TestBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @since Class available since Release 1.1.0
 */
class ReplaceSessionStorageDefinitionPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasDefinition('session.storage.mock_file')) {
            $container->getDefinition('phpmentors_route_based_session_configuration_test.mock_file_session_storage')->setArguments($container->getDefinition('session.storage.mock_file')->getArguments());
            $container->setAlias('session.storage.mock_file', 'phpmentors_route_based_session_configuration_test.mock_file_session_storage');
        }
    }
}
