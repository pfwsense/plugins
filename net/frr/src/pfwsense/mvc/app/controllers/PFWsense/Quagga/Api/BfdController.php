<?php

/*
 * Copyright (C) 2015-2017 Shanghai Sciinfo Technology Co., Ltd.
 * Copyright (C) 2017 Fabian Franz
 * Copyright (C) 2017-2021 Michael Muenz <m.muenz@gmail.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace PFWsense\Quagga\Api;

use PFWsense\Base\ApiMutableModelControllerBase;

class BfdController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'bfd';
    protected static $internalModelClass = '\PFWsense\Quagga\BFD';

    public function searchNeighborAction()
    {
        return $this->searchBase(
            'neighbors.neighbor',
            array("enabled",
                  "description",
                  "address")
        );
    }

    public function getNeighborAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('neighbor', 'neighbors.neighbor', $uuid);
    }

    public function addNeighborAction()
    {
        return $this->addBase('neighbor', 'neighbors.neighbor');
    }

    public function delNeighborAction($uuid)
    {
        return $this->delBase('neighbors.neighbor', $uuid);
    }

    public function setNeighborAction($uuid)
    {
        return $this->setBase('neighbor', 'neighbors.neighbor', $uuid);
    }

    public function toggleNeighborAction($uuid)
    {
        return $this->toggleBase('neighbors.neighbor', $uuid);
    }
}