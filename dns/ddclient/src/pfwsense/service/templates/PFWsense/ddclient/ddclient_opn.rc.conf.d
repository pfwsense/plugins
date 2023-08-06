{% if not helpers.empty('PFWsense.DynDNS.general.enabled') and PFWsense.DynDNS.general.backend|default('ddclient') == 'pfwsense' %}
ddclient_opn_enable="YES"
{% else %}
ddclient_opn_enable="NO"
{% endif %}
