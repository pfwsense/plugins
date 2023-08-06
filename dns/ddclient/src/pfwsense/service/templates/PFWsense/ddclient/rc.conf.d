{% if not helpers.empty('PFWsense.DynDNS.general.enabled') and PFWsense.DynDNS.general.backend|default('ddclient') == 'ddclient' %}
ddclient_enable="YES"
ddclient_flags="-daemon {{PFWsense.DynDNS.general.daemon_delay|default('300')}}"
{% else %}
ddclient_enable="NO"
{% endif %}
