<?php

require __DIR__ . '/../autoload.php';

$MemoryFinder = new \Model\InMemoryFinder();


// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
    __DIR__ . '/templates/'
), $debug);

/**
 * Index
 */
$app->get('/', function () use ($app) {
    return $app->render('index.php');
});

// ...

/**
 * GET /statuses
 */
$app->get('/statuses', function () use ($app) {
    $app->render("statuses.php", $MemoryFinder->findAll());
});

/**
 * GET /statuses/id
 */
$app->get('/statuses/(\d+)', $getStatusesId);

$getStatusesId = function ($id) use ($app) {
	$app->render("status.php", $MemoryFinder->findOneById($id));
};
 
/**
 * GET /users
 */
 
/**
 * GET /users
 */
 
/**
 * GET /users/name
 */
 
 
/**
 * POST /statuses
 */

/**
 * POST /users
 */
 
 
 
/**
 * DELETE /statuses
 */

/**
 * DELETE /statuses/id
 */
 
/**
 * DELETE /users
 */
 
/**
 * DELETE /users
 */
 
/**
 * DELETE /users/name
 */
 


return $app;
