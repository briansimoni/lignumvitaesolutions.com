chgrp -R daemon /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial
chown -R bitnami /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial

chgrp -R daemon /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child
chown -R bitnami /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child

chmod -R 664 /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial
chmod -R 664 /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child

find /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial -type d -exec chmod 775 {} \;
find /opt/bitnami/apps/wordpress/htdocs/wp-content/themes/industrial-child -type d -exec chmod 775 {} \;