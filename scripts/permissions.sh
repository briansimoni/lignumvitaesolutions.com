chgrp -R daemon /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial
chown -R bitnami /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial

chgrp -R daemon /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child
chown -R bitnami /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child

chmod -R 774 /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial
chmod -R 774 /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child

find /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial -type d -exec chmod o+x {} \;
find /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child -type d -exec chmod o+x {} \;