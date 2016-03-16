<?php

  require('vendor/autoload.php');
  require('includes/Beard.php');
  
  // Create and configure Slim app
  $app = new \Slim\App;

  // Get container
  $container = $app->getContainer();

  // Show errors
  $container['settings']['displayErrorDetails'] = true;

  // Register component on container
  $container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates/');
  };

  // Index action
  $app->get('/beards', function ($request, $response) {
//    $beardDB = new Beard();
//    $beards = $beardDB->getBeards();
    return $this->view->render($response, 'index.html.php', [
      'beards' => $beards
    ]);
  });

  // New action
  $app->get('/beards/new', function ($request, $response) {
    return $this->view->render($response, 'new.html.php');
  });

  // Show action
  $app->get('/beards/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    $beardDB = new Beard();
    $beard = $beardDB->getBeard($id);
    return $this->render($response, 'show.html.php', [
      'beard' => $beard
    ]);
  });

  // Create action
  $app->post('/beards', function ($request, $response) {
    $body = $request->getParsedBody(); // $_POST associative array
    $beardDb = new Beard();
    $beardDb->createBeard($body);
    return $response->withStatus(301)->withHeader('Location', '/slimapi/index.php/beards');
  });

  // Run app
  $app->run();

?>
