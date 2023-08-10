
cd /var/www/html
wp core download --allow-root
wp config create --allow-root --skip-check --dbname="xount" --dbuser="admin" --dbpass="admin" --dbhost=mysql --dbprefix="wp_" --extra-php="define('WP_DEBUG_LOG',true); define('WP_DEBUG_DISPLAY',false); define('WP_SITEURL', 'http://localhost:8000/'); define('WP_HOME', 'http://localhost:8000/');"
wp core install --allow-root --admin_user="admin" --admin_email="admin@admin.com" --admin_password="admin" --url="http://localhost:8000/" --title="Xount"

wp theme activate xount --allow-root
