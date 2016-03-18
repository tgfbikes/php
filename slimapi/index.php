<?php

  require('./vendor/autoload.php');
  require('./includes/Beard.php');

  function renderJSON($response, $status_code, $data) {
    $json = json_encode($data);
    return $response
      ->write($json)
      ->withStatus($status_code)
      ->withHeader('Content-Type', 'application/json');
  }
  
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

  // Index action .json
  $app->get('/beards.json', function ($request, $response) {
    $beardDB = new Beard();
    $beards = $beardDB->getBeards();
    $json = json_encode($beards);
    return renderJSON($response, 200, $beards);
  });

  // Index action
  $app->get('/beards', function ($request, $response) {
    $beardDB = new Beard();
    $beards = $beardDB->getBeards();
    return $this->view->render($response, 'index.html.php', [
      'beards' => $beards
    ]);
  });

  // New action
  $app->get('/beards/new', function ($request, $response) {
    return $this->view->render($response, 'new.html.php');
  });

  // Edit action
  $app->get('/beards/edit/{id}', function ($request, $response) {
    return $this->view->render($response, 'edit.html.php');
  });

  // Show action .json
  $app->get('/beards/{id}.json', function ($request, $response, $args) {
    $id = $args['id'];
    $beardDB = new Beard();
    $beard = $beardDB->getBeard($id);
    return renderJSON($response, 200, $beard);
  });

  // Show action
  $app->get('/beards/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    $beardDB = new Beard();
    $beard = $beardDB->getBeard($id);
    return $this->view->render($response, 'show.html.php', [
      'beard' => $beard
    ]);
  });

  // Create action .json
  $app->post('/beards.json', function ($request, $response) {
    $body = $request->getParsedBody(); // $_POST associative array
    $beardDb = new Beard();
    $beardDb->createBeard($body);
    return renderJSON($response, 201, $beard);
  });

  // Create action
  $app->post('/beards', function ($request, $response) {
    $body = $request->getParsedBody(); // $_POST associative array
    $beardDb = new Beard();
    $beardDb->createBeard($body);
    return $response->withStatus(302)->withHeader('Location', '/slimapi/index.php/beards');
  });

  // Run app
  $app->run();

?>
