{% if helpers.exists('PFWsense.puppetagent.general') and PFWsense.puppetagent.general.Enabled|default("0") == "1" %}
puppet_enable="YES"
{% else %}
puppet_enable="NO"
{% endif %}
