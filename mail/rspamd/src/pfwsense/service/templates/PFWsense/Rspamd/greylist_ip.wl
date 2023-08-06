{% if helpers.exists('PFWsense.Rspamd.general.enabled') and PFWsense.Rspamd.general.enabled == '1' and helpers.exists('PFWsense.Rspamd.graylist.whitelist_ip') and PFWsense.Rspamd.graylist.whitelist_ip != '' %}
{%   for host in PFWsense.Rspamd.graylist.whitelist_ip.split(',') %}
{{ host }}
{%   endfor %}
{% endif %}
