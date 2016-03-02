<?php

  require('vendor/autoload.php');
  
  // Create and configure Slim app
  $app = new \Slim\App;

  // Get container
  $container = $app->getContainer();

  // Register component on container
  $container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates/');
  };

  // Index action
  $app->get('/beards', function ($request, $response) {
    return $this->view->render($response, 'index.html.php');
  });

  // New action
  $app->get('/beards/new', function ($request, $response) {
    return $this->view->render($response, 'new.html.php');
  });

  // Show action
  $app->get('/beards/{id}', function ($request, $response) {
    return $response->write('show');
  });

  // Create action
  $app->post('/beards', function ($request, $response) {
    return $this->view->render($response, 'create.html.php');
  });

  // Run app
  $app->run();

?>
