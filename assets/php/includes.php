<?php

  require('db_connect.php');
  require('animals.php');
  require('player.php');

  $db = new db_connect;

  $mammal = new mammal;
  $reptilian = new reptilian;
  $avian = new avian;

?>
