<?php
  $host_name = 'db5018884632.hosting-data.io';
  $database = 'dbs14898871';
  $user_name = 'dbu5401157';
  $password = 'RealT@lker300!!';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Failed to connect to MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '<p>Connection to MySQL server successfully established.</p>';
  }
?>