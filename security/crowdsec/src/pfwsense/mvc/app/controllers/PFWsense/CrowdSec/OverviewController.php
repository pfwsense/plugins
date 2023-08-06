<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace PFWsense\CrowdSec;

/**
 * Class OverviewController
 * @package PFWsense\CrowdSec
 */
class OverviewController extends \PFWsense\Base\IndexController
{
    public function indexAction()
    {
        $this->view->pick('PFWsense/CrowdSec/overview');
    }
}
