<?php

function proxy_sso_configure()
{
    return [
        'webproxy' => ['proxy_sso_squid_hook:2'],
    ];
}

function proxy_sso_squid_hook($verbose, $action)
{
    if (!in_array($action, ['restart', 'reload', 'start', 'stop'])) {
        exit;
    }

    service_log('template reload PFWsense/ProxySSO: ', $verbose);

    $res = configd_run('template reload PFWsense/ProxySSO');

    service_log(trim($res) . "\n", $verbose);
}

function proxy_sso_xmlrpc_sync()
{
    $result = [];

    $result['id'] = 'proxysso';
    $result['section'] = 'PFWsense.ProxySSO';
    $result['description'] = gettext('Kerberos authentication module');

    return [$result];
}
