<?php

define('PAUSADO',1);
define('PUBLICADA',2);
define('FINALIZADA',3);

define('FILTROS_ESTADOS', serialize (array(
0 => "TODOS",
PAUSADO => "PAUSADO",
PUBLICADA => "PUBLICADA",
FINALIZADA => "FINALIZADA",
)));

define('GRATIS',1);
define('BASICA',2);
define('PREMIUM',3);
define('TIPOS_PUBLICACION', serialize (array(GRATIS=>'GRATIS',BASICA=>'BASICA',PREMIUM=>'PREMIUM')));

define('MONEDAS',serialize(array('ARS'=>'ARS','USD'=>'USD')));

