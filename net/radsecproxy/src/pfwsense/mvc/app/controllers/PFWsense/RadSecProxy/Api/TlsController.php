<?php

/*
    Copyright (C) 2020 Tobias Boehnert
    All rights reserved.
    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:
    1. Redistributions of source code must retain the above copyright notice,
       this list of conditions and the following disclaimer.
    2. Redistributions in binary form must reproduce the above copyright
       notice, this list of conditions and the following disclaimer in the
       documentation and/or other materials provided with the distribution.
    THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
    INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
    AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
    AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
    OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
    SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
    INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
    CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
    ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
    POSSIBILITY OF SUCH DAMAGE.
*/

namespace PFWsense\RadSecProxy\Api;

use PFWsense\Base\ApiMutableModelControllerBase;

class TlsController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'radsecproxy';
    protected static $internalModelClass = 'PFWsense\RadSecProxy\RadSecProxy';

    public function searchItemAction()
    {
        return $this->searchBase(
            "tlsConfigs.tlsConfig",
            array('description', 'name', 'caCertificateRefId', 'proxyCertificateRefId'),
            "name"
        );
    }

    public function setItemAction($uuid)
    {
        return $this->setBase("tlsConfig", "tlsConfigs.tlsConfig", $uuid);
    }

    public function addItemAction()
    {
        return $this->addBase("tlsConfig", "tlsConfigs.tlsConfig");
    }

    public function getItemAction($uuid = null)
    {
        return $this->getBase("tlsConfig", "tlsConfigs.tlsConfig", $uuid);
    }

    public function delItemAction($uuid)
    {
        return $this->delBase("tlsConfigs.tlsConfig", $uuid);
    }

    public function toggleItemAction($uuid, $enabled = null)
    {
        return $this->toggleBase("tlsConfigs.tlsConfig", $uuid, $enabled);
    }
}
