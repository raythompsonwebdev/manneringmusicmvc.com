<?php
try {
  include __DIR__ . '/../includes/autoload.php';


  // re-write url for routes
  $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

  //provides route controller and route methods to requested pages
  $entryPoint = new \Mannering\EntryPoint($route, $_SERVER['REQUEST_METHOD'], new \Madb\MadbRoutes());

  $entryPoint->run();
} catch (PDOException $e) {
  $title = 'An error has occurred';

  $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();

  include  __DIR__ . '/../templates/layout.html.php';
}
