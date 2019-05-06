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

namespace PHPMentors\RouteBasedSessionConfigurationBundle\Functional\Bundle\TestBundle\Session\Storage;

/**
 * @since Class available since Release 1.1.0
 */
class MockFileSessionStorage extends \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage
{
    private $options = array();

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
