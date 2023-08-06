{% if helpers.exists('PFWsense.Rspamd.general.enabled') and PFWsense.Rspamd.general.enabled == '1' and helpers.exists('PFWsense.Rspamd.av.whitelist') and PFWsense.Rspamd.av.whitelist != '' %}
{%   for host in PFWsense.Rspamd.av.whitelist.split(',') %}
{{ host }}
{%   endfor %}
{% endif %}
