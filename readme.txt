Jos kysyy salasanaa niin se on: vagrant 

sudo nano /etc/apache2/sites-available/000-default.conf
DocumentRoot /var/www/html VAIHDA DocumentRoot /home/vagrant/

sudo nano /etc/apache2/apache2.conf
<Directory /var/www/html/> VAIHDA <Directory /home/vagrant/>

sudo /etc/init.d/apache2 restart

lopuksi pistä selaimeen
http://127.0.0.1:4567/datadump.php

jonka jälkeen pistä

http://127.0.0.1:4567

pitäis toimia

