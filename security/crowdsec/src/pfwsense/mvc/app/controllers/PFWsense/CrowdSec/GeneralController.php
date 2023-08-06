<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace PFWsense\CrowdSec;

/**
 * Class GeneralController
 * @package PFWsense\CrowdSec
 */
class GeneralController extends \PFWsense\Base\IndexController
{
    public function indexAction()
    {
        $this->view->pick('PFWsense/CrowdSec/general');
        $this->view->generalForm = $this->getForm("general");
    }
}
