{% if helpers.exists('PFWsense.Rspamd.general.enabled') and PFWsense.Rspamd.general.enabled == '1' %}
upstream "local" {
  default = yes;
  hosts = "/var/run/rspamd/normal.sock";
}
bind_socket = "/var/run/rspamd/milter.sock mode=0666 owner=rspamd";
{% endif %}
