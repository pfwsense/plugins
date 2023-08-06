{% if helpers.exists('PFWsense.Rspamd.general.enabled') and PFWsense.Rspamd.general.enabled == '1' %}
bind_socket = "/var/run/rspamd/normal.sock mode=0666 owner=rspamd";
{% endif %}
