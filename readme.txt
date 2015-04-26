Lyhyt käyttöönotto ohje:

Kloonaa repo, mene git shellillä tai vastaavalla kloonaamaasi kansioon

kirjoita vagrant up

( Vagrant ssh.ta ei tarvitse tehdä mutta jos välttämättä haluaa:

Jos kysyy salasanaa niin se on: vagrant
tiedostot joita synkataan pitäisi olla muistaakseni /var/www/html kansiossa.
 
)
 
Muokkaa vain paikallistiedostoja (tiedostoja mitkä kloonasit), ne synkataan apachen www kansioon

Homma toimii myös toisinpäin. Eli aina kun committaat ja synkkaat tämän filun niin älä committaa index.html. 
Se on apachen oletustiedosto www kansiosta.

Jos et ole kirjautunut sivustolle niin tämä linkki tekee admin tunnukset.
käyttis: admin 
salasana: admin123  
http://127.0.0.1:4567/datadump.php

jonka jälkeen pistä

http://127.0.0.1:4567

pitäis toimia.

Testauksesta

Tuote on testattu Firefox 37.02 ja internet explorer 11

käyttäjiä on ollut 3000
tauluja 7000
tikettejä 14000

käyttäjien ja taulujen haku toimii vain ladatuille tiedoille ja tiedot on pätkitty 400 kpl eriin.

Asentaminen muualle kuin testiympäristöön

suorita seuraavat komennot / asenna niissä mainitut välineet:
sudo apt-get install -y apache2
sudo apt-get install -y php5
sudo apt-get install -y php5-cli php5-mongo mongodb-server

siirrä repon dev kansio apachen /var/www/html/dev

käynnistä apache uudelleen
service apache2 restart 

Marko kirjoita miten statistic, export ja import toimii yms
