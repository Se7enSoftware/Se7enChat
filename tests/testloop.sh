#!/bin/bash
while [ true ]; do
	../vendor/bin/phpunit -c phpunit.xml
    sleep 3
done
