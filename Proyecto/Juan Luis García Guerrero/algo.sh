#! /bin/bash
chown www-data:www-data /dev/ttyACM0
chmod 777 /dev/ttyACM0
python /var/www/html/Pruebas/python.py 
