echo "-- Update packages --"
sudo add-apt-repository -y ppa:ondrej/php
sudo add-apt-repository -y ppa:phpmyadmin/ppa
sudo apt-get update
sudo apt-get upgrade

echo "-- Prepare configuration for MySQL and PHPMyAdmin--"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password "
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password root"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password "
sudo debconf-set-selections <<<"phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"

echo "-- Install tools and helpers --"
sudo apt-get install -y vim curl

echo "-- Install packages --"
sudo apt-get install -y apache2 mysql-server phpmyadmin
sudo apt-get install -y php7.4-common php7.4-dev php7.4-json php7.4-opcache php7.4-cli libapache2-mod-php7.4
sudo apt-get install -y php7.4 php7.4-mysql php7.4-fpm php7.4-curl php7.4-gd php7.4-xml php7.4-mbstring
sudo apt-get install -y php7.4-bcmath php7.4-zip

echo "-- Copy development php.ini --"
sudo cp /usr/lib/php/7.4/php.ini-development  /etc/php/7.4/apache2/php.ini

echo "-- Set root directory --";
VHOST=$(cat <<EOF
<VirtualHost *:80>
	DocumentRoot /var/www/html/public
	ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf

echo "-- Import database structure and seed fake data --"
mysql --user=root --password=root < /var/www/html/database/db.sql
cd /var/www/html
php scripts/seed.php

echo "-- Restart Apache --"
sudo /etc/init.d/apache2 restart