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

namespace PHPMentors\RouteBasedSessionConfigurationBundle;

use PHPMentors\RouteBasedSessionConfigurationBundle\DependencyInjection\PHPMentorsRouteBasedSessionConfigurationExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PHPMentorsRouteBasedSessionConfigurationBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if ($this->extension === null) {
            $this->extension = new PHPMentorsRouteBasedSessionConfigurationExtension();
        }

        return $this->extension;
    }
}
