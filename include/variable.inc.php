
<?php
  $debug = 1;
  $host = "sql107.byethost10.com";
  $dbname = "b10_16807313_acebedo";
  $dbuser = "b10_16807313";
  $pwd = "Dublin2013";
  $dbc =0;
  $dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');
?>