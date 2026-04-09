<?php

require_once('vendor/autoload.php');
ORM::configure('mysql:host=localhost;dbname=db_perpus');
ORM::configure('username', 'root');
ORM::configure('password', '');
//nantinya dapat digunakan untuk melihat hasil query
ORM::configure('logging', true);

?>