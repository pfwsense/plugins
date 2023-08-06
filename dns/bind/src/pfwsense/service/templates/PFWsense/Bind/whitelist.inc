{% if helpers.exists('PFWsense.bind.general.enabled') and PFWsense.bind.general.enabled == '1' %}
{%   if helpers.exists('PFWsense.bind.dnsbl.enabled') and PFWsense.bind.dnsbl.enabled == '1' %}
{%     if helpers.exists('PFWsense.bind.dnsbl.type') and PFWsense.bind.dnsbl.type != '' %}
{%       if helpers.exists('PFWsense.bind.dnsbl.whitelists') and PFWsense.bind.dnsbl.whitelists != '' %}
{%         for whitelist in PFWsense.bind.dnsbl.whitelists.split(',') %}
{{ whitelist }}		IN	CNAME	rpz-passthru.
*.{{ whitelist }}	IN	CNAME	rpz-passthru.
{%         endfor %}
{%       endif %}
{%     endif %}
{%   endif %}
{% endif %}
