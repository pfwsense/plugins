<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace PFWsense\CrowdSec\Api;

use PFWsense\Base\ApiControllerBase;
use PFWsense\CrowdSec\CrowdSec;
use PFWsense\Core\Backend;

/**
 * @package PFWsense\CrowdSec
 */
class VersionController extends ApiControllerBase
{
    /**
     * retrieve version description
     * @return version description
     * @throws \PFWsense\Base\ModelException
     * @throws \ReflectionException
     */
    public function getAction()
    {
        $backend = new Backend();
        return $backend->configdRun("crowdsec version");
    }
}
