{% if not helpers.empty('PFWsense.Stunnel.general.enabled') and
      not helpers.empty('PFWsense.Stunnel.general.enable_ident_server') %}
identd_stunnel_enable="YES"
{% else %}
identd_stunnel_enable="NO"
{% endif %}
