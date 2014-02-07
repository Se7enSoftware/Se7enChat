# Set file permissions correctly. The following directories must be writable.
chmod 777 Public/Styles/
chmod 777 Libraries/Database/SQLite/

# Install the latest Composer because sometimes Travis' is out of date.
curl -sS https://getcomposer.org/installer | php
php composer.phar install;

# Run the tests.
vendor/bin/phpunit -c Tests/phpunit.xml
