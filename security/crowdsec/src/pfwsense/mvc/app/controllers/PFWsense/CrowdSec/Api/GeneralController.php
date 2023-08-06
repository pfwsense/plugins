<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace PFWsense\CrowdSec\Api;

use PFWsense\Base\ApiMutableModelControllerBase;

/**
 * @package PFWsense\CrowdSec
 */
class GeneralController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'general';
    protected static $internalModelClass = '\PFWsense\CrowdSec\General';
}
