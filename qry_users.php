<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/../classes/Users.php';
  $results = new Users();
  $users = $results->getAll();
?>