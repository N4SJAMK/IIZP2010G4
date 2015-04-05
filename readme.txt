Lyhyt käyttöönotto ohje:

Kloonaa repo, mene git shellillä tai vastaavalla kloonaamaasi kansioon

kirjoita vagrant up

( Vagrant ssh.ta ei tarvitse tehdä mutta jos välttämättä haluaa:

Jos kysyy salasanaa niin se on: vagrant
tiedostot joita synkataan pitäisi olla muistaakseni /var/www/html kansiossa.
 
)
 
Muokkaa vain paikallistiedostoja (tiedostoja mitkä kloonasit), ne synkataan apachen www kansioon

Homma toimii myös toisinpäin. Eli aina kun committaat ja synkkaat tämän filun niin älä committaa index.html. Se on apachen oletus
tiedosto www kansiosta.

Pistä alla oleva selaimeen niin saat testidataa kantaan
http://127.0.0.1:4567/datadump.php

jonka jälkeen pistä

http://127.0.0.1:4567

pitäis toimia

